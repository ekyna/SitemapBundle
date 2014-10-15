<?php

namespace Ekyna\Bundle\SitemapBundle\Model;

/**
 * Class Entry
 * @package Ekyna\Bundle\SitemapBundle\Model
 * @author Étienne Dauvergne <contact@ekyna.com>
 */
class Entry implements EntryInterface
{
    /**
     * @var string
     */
    private $location;

    /**
     * @var string
     */
    private $lastmod;

    /**
     * @var string
     */
    private $changefreq;

    /**
     * @var float
     */
    private $priority;

    /**
     * {@inheritdoc}
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * {@inheritdoc}
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLastmod()
    {
        return $this->lastmod;
    }

    /**
     * {@inheritdoc}
     */
    public function setLastmod($lastmod)
    {
        $this->lastmod = $lastmod;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getChangefreq()
    {
        return $this->changefreq;
    }

    /**
     * {@inheritdoc}
     */
    public function setChangefreq($changefreq)
    {
        $this->changefreq = $changefreq;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * {@inheritdoc}
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
        return $this;
    }
}
