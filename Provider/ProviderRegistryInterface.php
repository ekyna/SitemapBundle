<?php

namespace Ekyna\Bundle\SitemapBundle\Provider;

/**
 * Interface ProviderRegistryInterface
 * @package Ekyna\Bundle\SitemapBundle\Provider
 * @author Étienne Dauvergne <contact@ekyna.com>
 */
interface ProviderRegistryInterface
{
    /**
     * Registers the provider.
     *
     * @param ProviderInterface $provider
     *
     * @throws \InvalidArgumentException
     */
    public function addProvider(ProviderInterface $provider);

    /**
     * Returns the provider by name.
     *
     * @param $name
     *
     * @throws \InvalidArgumentException
     *
     * @return ProviderInterface
     */
    public function getProviderByName($name);

    /**
     * Returns the registered providers by group.
     *
     * @param string $group
     *
     * @throws \InvalidArgumentException
     *
     * @return ProviderInterface[]
     */
    public function getProvidersByGroup($group = null);

    /**
     * Returns the registered providers.
     *
     * @return ProviderInterface[]
     */
    public function getProviders();

    /**
     * Returns the groups.
     *
     * @return array
     */
    public function getGroups();
} 