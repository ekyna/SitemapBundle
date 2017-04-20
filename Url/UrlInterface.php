<?php

declare(strict_types=1);

namespace Ekyna\Bundle\SitemapBundle\Url;

use DateTimeInterface;

/**
 * Interface UrlInterface
 * @package Ekyna\Bundle\SitemapBundle\Url
 * @author Étienne Dauvergne <contact@ekyna.com>
 */
interface UrlInterface
{
    public function getLocation(): ?string;

    public function setLocation(?string $location): UrlInterface;

    public function getLastmod(): ?DateTimeInterface;

    public function setLastmod(?DateTimeInterface $lastmod): UrlInterface;

    public function getChangefreq(): ?string;

    public function setChangefreq(?string $changefreq): UrlInterface;

    public function getPriority(): ?string;

    public function setPriority(?string $priority): UrlInterface;
}
