<?php

declare(strict_types=1);

namespace Ekyna\Bundle\SitemapBundle\Provider;

use DateTimeInterface;

/**
 * Class AbstractProvider
 * @package Ekyna\Bundle\SitemapBundle\Provider
 * @author Étienne Dauvergne <contact@ekyna.com>
 */
abstract class AbstractProvider implements ProviderInterface
{
    abstract public function getLastUpdateDate(): ?DateTimeInterface;

    abstract public function getUrls(): array;

    public function getSitemap(): string
    {
        return 'default';
    }

    abstract public function getName(): string;
}
