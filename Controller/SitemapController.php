<?php

namespace Ekyna\Bundle\SitemapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SitemapController
 * @package Ekyna\Bundle\SitemapBundle\Controller
 * @author Étienne Dauvergne <contact@ekyna.com>
 */
class SitemapController extends Controller
{
    /**
     * Sitemap.
     *
     * @return Response
     */
    public function sitemapAction(Request $request)
    {
        $group = $request->attributes->get('group', null);

        $registry = $this->get('ekyna_sitemap.provider_registry');
        $providers = $registry->getProvidersByGroup($group);

        $response = new Response();
        if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) {

            $lastUpdateDate = null;
            /** @var \Ekyna\Bundle\SitemapBundle\Provider\ProviderInterface $provider */
            foreach($providers as $provider) {
                if (null === $lastUpdateDate || $lastUpdateDate < $provider->getLastUpdateDate()) {
                    $lastUpdateDate = $provider->getLastUpdateDate();
                }
            }

            $response->setLastModified($lastUpdateDate);
            $response->setPublic();
            if ($response->isNotModified($request)) {
                return $response;
            }
            $response->setMaxAge(600);
        }

        $response->headers->add(array('Content-Type' => 'application/xml; charset=UTF-8'));

        $datas = array(
            'providers' => $providers,
        );
        if (null === $group) {
            $datas['groups'] = $registry->getGroups();
        }

        return $response->setContent($this->renderView('EkynaSitemapBundle:Sitemap:sitemap.xml.twig', $datas));
    }
}
