<?php

declare(strict_types=1);

namespace Ekyna\Bundle\SitemapBundle\Url;

use DateTimeInterface;

/**
 * Class Url
 * @package Ekyna\Bundle\SitemapBundle\Url
 * @author  Étienne Dauvergne <contact@ekyna.com>
 */
class Url implements UrlInterface
{
    private ?string            $location   = null;
    private ?DateTimeInterface $lastmod    = null;
    private ?string            $changefreq = null;
    private ?string            $priority   = null;

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): UrlInterface
    {
        $this->location = $location;

        return $this;
    }

    public function getLastmod(): ?DateTimeInterface
    {
        return $this->lastmod;
    }

    public function setLastmod(?DateTimeInterface $lastmod): UrlInterface
    {
        $this->lastmod = $lastmod;

        return $this;
    }

    public function getChangefreq(): ?string
    {
        return $this->changefreq;
    }

    public function setChangefreq(?string $changefreq): UrlInterface
    {
        $this->changefreq = $changefreq;

        return $this;
    }

    public function getPriority(): ?string
    {
        return $this->priority;
    }

    public function setPriority(?string $priority): UrlInterface
    {
        $this->priority = $priority;

        return $this;
    }
}
