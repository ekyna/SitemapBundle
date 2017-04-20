<?php

declare(strict_types=1);

namespace Ekyna\Bundle\SitemapBundle\DependencyInjection;

use Ekyna\Bundle\SitemapBundle\Controller\SitemapController;
use Ekyna\Bundle\SitemapBundle\Provider\ProviderRegistry;
use Ekyna\Bundle\SitemapBundle\Provider\ProviderRegistryInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class EkynaSitemapExtension
 * @package Ekyna\Bundle\SitemapBundle\DependencyInjection
 * @author Étienne Dauvergne <contact@ekyna.com>
 */
class EkynaSitemapExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $config = $this->processConfiguration(new Configuration(), $configs);

        $container->register('ekyna_sitemap.provider_registry', ProviderRegistry::class);

        $container->setAlias(ProviderRegistryInterface::class, 'ekyna_sitemap.provider_registry');

        $container
            ->register('ekyna_sitemap.controller.sitemap', SitemapController::class)
            ->setArguments([
                new Reference('ekyna_sitemap.provider_registry'),
                new Reference('twig'),
                $config
            ]);

        $container
            ->setAlias(SitemapController::class, 'ekyna_sitemap.controller.sitemap')
            ->setPublic(true);
    }
}
