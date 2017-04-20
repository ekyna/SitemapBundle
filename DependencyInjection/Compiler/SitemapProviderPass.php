<?php

declare(strict_types=1);

namespace Ekyna\Bundle\SitemapBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class SitemapProviderPass
 * @package Ekyna\Bundle\SitemapBundle\DependencyInjection\Compiler
 * @author Étienne Dauvergne <contact@ekyna.com>
 */
class SitemapProviderPass implements CompilerPassInterface
{
    public const TAG = 'ekyna_sitemap.provider';

    public function process(ContainerBuilder $container): void
    {
        $definition = $container->getDefinition('ekyna_sitemap.provider_registry');

        foreach ($container->findTaggedServiceIds(self::TAG) as $service => $attributes) {
            $definition->addMethodCall('addProvider', [new Reference($service)]);
        }
    }
}
