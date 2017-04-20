<?php

declare(strict_types=1);

namespace Ekyna\Bundle\SitemapBundle\Controller;

use Ekyna\Bundle\SitemapBundle\Provider\ProviderRegistryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Twig\Environment;

/**
 * Class SitemapController
 * @package Ekyna\Bundle\SitemapBundle\Controller
 * @author  Étienne Dauvergne <contact@ekyna.com>
 */
class SitemapController
{
    private ProviderRegistryInterface $providerRegistry;
    private Environment               $twig;
    private array                     $config;

    public function __construct(ProviderRegistryInterface $providerRegistry, Environment $twig, array $config)
    {
        $this->providerRegistry = $providerRegistry;
        $this->twig = $twig;

        $this->config = array_replace([
            'index_ttl'   => 0,
            'sitemap_ttl' => 0,
        ], $config);
    }

    /**
     * Renders the sitemaps index.
     */
    public function index(Request $request): Response
    {
        $sitemaps = [];

        $lastUpdateDate = null;
        foreach ($this->providerRegistry->getSitemaps() as $sitemap) {
            $providers = $this->providerRegistry->getProvidersBySitemap($sitemap);
            $sitemapLastUpdateDate = null;
            foreach ($providers as $provider) {
                if (null === $sitemapLastUpdateDate || $sitemapLastUpdateDate < $provider->getLastUpdateDate()) {
                    $sitemapLastUpdateDate = $provider->getLastUpdateDate();
                }
            }
            $sitemaps[$sitemap] = $sitemapLastUpdateDate;
            if (null === $lastUpdateDate || $lastUpdateDate < $sitemapLastUpdateDate) {
                $lastUpdateDate = $sitemapLastUpdateDate;
            }
        }

        $response = new Response();
        $response->setLastModified($lastUpdateDate);
        $response->setPublic();
        if ($response->isNotModified($request)) {
            return $response;
        }

        $response->headers->add(['Content-Type' => 'application/xml; charset=UTF-8']);
        $response->setMaxAge($this->config['index_ttl']);

        $content = $this->twig->render('@EkynaSitemap/Sitemap/index.xml.twig', [
            'sitemaps' => $sitemaps,
        ]);

        return $response->setContent($content);
    }

    /**
     * Renders the sitemap.
     */
    public function sitemap(Request $request): Response
    {
        $sitemap = $request->attributes->get('sitemap');

        $providers = $this->providerRegistry->getProvidersBySitemap($sitemap);
        if (0 === count($providers)) {
            throw new NotFoundHttpException('Sitemap not found.');
        }

        $lastUpdateDate = null;
        foreach ($providers as $provider) {
            if (null === $lastUpdateDate || $lastUpdateDate < $provider->getLastUpdateDate()) {
                $lastUpdateDate = $provider->getLastUpdateDate();
            }
        }

        $response = new Response();
        $response->setLastModified($lastUpdateDate);
        $response->setPublic();
        if ($response->isNotModified($request)) {
            return $response;
        }

        $response->setMaxAge($this->config['sitemap_ttl']);
        $response->headers->add(['Content-Type' => 'application/xml; charset=UTF-8']);

        $content = $this->twig->render('@EkynaSitemap/Sitemap/sitemap.xml.twig', [
            'providers' => $providers,
        ]);

        return $response->setContent($content);
    }
}
