<?php

declare(strict_types=1);

namespace Ekyna\Bundle\SitemapBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package Ekyna\Bundle\SitemapBundle\DependencyInjection
 * @author  Étienne Dauvergne <contact@ekyna.com>
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('ekyna_sitemap');

        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->integerNode('index_ttl')->defaultValue(24 * 3600)->end()
                ->integerNode('sitemap_ttl')->defaultValue(3 * 3600)->end()
            ->end();

        return $treeBuilder;
    }
}
