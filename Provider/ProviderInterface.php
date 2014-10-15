<?php

namespace Ekyna\Bundle\SitemapBundle\Provider;

/**
 * Interface ProviderInterface
 * @package Ekyna\Bundle\SitemapBundle\Provider
 * @author Étienne Dauvergne <contact@ekyna.com>
 */
interface ProviderInterface
{
    /**
     * Returns the last update datetime.
     *
     * @return \DateTime
     */
    public function getLastUpdateDate();

    /**
     * Returns the sitemap entries.
     *
     * @return array|\Ekyna\Bundle\SitemapBundle\Model\EntryInterface[]
     */
    public function getEntries();

    /**
     * Returns the group.
     *
     * @return null|string
     */
    public function getGroup();

    /**
     * Returns the name.
     *
     * @return string
     */
    public function getName();
}
