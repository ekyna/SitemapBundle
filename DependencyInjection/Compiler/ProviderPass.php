<?php

namespace Ekyna\Bundle\SitemapBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class ProviderPass
 * @package Ekyna\Bundle\SitemapBundle\DependencyInjection\Compiler
 * @author Étienne Dauvergne <contact@ekyna.com>
 */
class ProviderPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('ekyna_sitemap.provider_registry')) {
            return;
        }

        $definition = $container->getDefinition('ekyna_sitemap.provider_registry');

        foreach ($container->findTaggedServiceIds('ekyna_sitemap.provider') as $serviceId => $tag) {
            $definition->addMethodCall('addProvider', array(new Reference($serviceId)));
        }
    }
}
