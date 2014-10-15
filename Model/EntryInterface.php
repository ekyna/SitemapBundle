<?php

namespace Ekyna\Bundle\SitemapBundle\Model;

/**
 * Interface EntryInterface
 * @package Ekyna\Bundle\SitemapBundle\Model
 * @author Étienne Dauvergne <contact@ekyna.com>
 */
interface EntryInterface
{
    /**
     * Returns the location.
     *
     * @return string
     */
    public function getLocation();

    /**
     * Sets the location.
     *
     * @param string $location
     * @return EntryInterface|$this
     */
    public function setLocation($location);

    /**
     * Returns the lastmod.
     *
     * @return string
     */
    public function getLastmod();

    /**
     * Sets the lastmod.
     *
     * @param string $lastmod
     * @return EntryInterface|$this
     */
    public function setLastmod($lastmod);

    /**
     * Returns the changefreq.
     *
     * @return string
     */
    public function getChangefreq();

    /**
     * Sets the changefreq.
     *
     * @param string $changefreq
     * @return EntryInterface|$this
     */
    public function setChangefreq($changefreq);

    /**
     * Returns the priority.
     *
     * @return float
     */
    public function getPriority();

    /**
     * Sets the priority.
     *
     * @param float $priority
     * @return EntryInterface|$this
     */
    public function setPriority($priority);
}
