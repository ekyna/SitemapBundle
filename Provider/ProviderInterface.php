<?php

declare(strict_types=1);

namespace Ekyna\Bundle\SitemapBundle\Provider;

use DateTimeInterface;
use Ekyna\Bundle\SitemapBundle\Url\UrlInterface;

/**
 * Interface ProviderInterface
 * @package Ekyna\Bundle\SitemapBundle\Provider
 * @author Étienne Dauvergne <contact@ekyna.com>
 */
interface ProviderInterface
{
    /**
     * Returns the last update datetime.
     */
    public function getLastUpdateDate(): ?DateTimeInterface;

    /**
     * Returns the sitemap urls.
     *
     * @return array<UrlInterface>
     */
    public function getUrls(): array;

    /**
     * Returns the sitemap name.
     */
    public function getSitemap(): string;

    /**
     * Returns the provider name.
     */
    public function getName(): string;
}
