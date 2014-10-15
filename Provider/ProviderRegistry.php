<?php

namespace Ekyna\Bundle\SitemapBundle\Provider;

/**
 * Class ProviderRegistry
 * @package Ekyna\Bundle\SitemapBundle\Provider
 * @author Étienne Dauvergne <contact@ekyna.com>
 */
class ProviderRegistry implements ProviderRegistryInterface
{
    /**
     * @var array|ProviderInterface[]
     */
    private $providers;

    /**
     * @var array
     */
    private $groups;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->providers = [];
        $this->groups = [];
    }

    /**
     * {@inheritdoc}
     */
    public function addProvider(ProviderInterface $provider)
    {
        if (array_key_exists($provider->getName(), $this->providers)) {
            throw new \InvalidArgumentException(sprintf('Provider "%s" is already registered.', $provider->getName()));
        }
        if (null !== $provider->getGroup() && !in_array($provider->getGroup(), $this->groups)) {
            $this->groups[] = $provider->getGroup();
        }
        $this->providers[$provider->getName()] = $provider;
    }

    /**
     * {@inheritdoc}
     */
    public function getProviderByName($name)
    {
        if (array_key_exists($name, $this->providers)) {
            return $this->providers[$name];
        }
        throw new \InvalidArgumentException(sprintf('Provider "%s" not found.', $name));
    }

    /**
     * {@inheritdoc}
     */
    public function getProvidersByGroup($group = null)
    {
        if (null !== $group && !in_array($group, $this->groups)) {
            throw new \InvalidArgumentException(sprintf('Group "%s" not found.', $group));
        }
        $providers = [];
        foreach($this->providers as $provider) {
            if ($provider->getGroup() === $group) {
                $providers[] = $provider;
            }
        }
        return $providers;
    }

    /**
     * {@inheritdoc}
     */
    public function getProviders()
    {
        return $this->providers;
    }

    /**
     * {@inheritdoc}
     */
    public function getGroups()
    {
        return $this->groups;
    }
}
