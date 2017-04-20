<?php

declare(strict_types=1);

namespace Ekyna\Bundle\SitemapBundle\Provider;

/**
 * Interface ProviderRegistryInterface
 * @package Ekyna\Bundle\SitemapBundle\Provider
 * @author Étienne Dauvergne <contact@ekyna.com>
 */
interface ProviderRegistryInterface
{
    public function addProvider(ProviderInterface $provider): void;

    /**
     * @return array<ProviderInterface>
     */
    public function getProvidersBySitemap(string $sitemap): array;

    /**
     * @return array<ProviderInterface>
     */
    public function getProviders(): array;

    /**
     * @return array<string>
     */
    public function getSitemaps(): array;
}
