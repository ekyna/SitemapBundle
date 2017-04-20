<?php

declare(strict_types=1);

namespace Ekyna\Bundle\SitemapBundle;

use Ekyna\Bundle\SitemapBundle\DependencyInjection\Compiler\SitemapProviderPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class EkynaSitemapBundle
 * @package Ekyna\Bundle\SitemapBundle
 * @author Étienne Dauvergne <contact@ekyna.com>
 */
class EkynaSitemapBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new SitemapProviderPass());
    }
}
