<?php

declare(strict_types=1);

namespace Ekyna\Bundle\SitemapBundle\Provider;

use InvalidArgumentException;

/**
 * Class ProviderRegistry
 * @package Ekyna\Bundle\SitemapBundle\Provider
 * @author  Étienne Dauvergne <contact@ekyna.com>
 */
class ProviderRegistry implements ProviderRegistryInterface
{
    /** @var array<ProviderInterface> */
    private array $providers;
    /** @var array<string> */
    private $sitemaps;

    public function __construct()
    {
        $this->providers = [];
        $this->sitemaps = [];
    }

    public function addProvider(ProviderInterface $provider): void
    {
        if (array_key_exists($provider->getName(), $this->providers)) {
            throw new InvalidArgumentException(sprintf('Provider "%s" is already registered.', $provider->getName()));
        }

        if (!in_array($provider->getSitemap(), $this->sitemaps)) {
            $this->sitemaps[] = $provider->getSitemap();
        }

        $this->providers[$provider->getName()] = $provider;
    }

    public function getProvidersBySitemap(string $sitemap): array
    {
        $providers = [];
        foreach ($this->providers as $provider) {
            if ($provider->getSitemap() === $sitemap) {
                $providers[] = $provider;
            }
        }

        return $providers;
    }

    public function getProviders(): array
    {
        return $this->providers;
    }

    public function getSitemaps(): array
    {
        return $this->sitemaps;
    }
}
