<?php

/*
 * This file is part of the Elcodi package.
 *
 * Copyright (c) 2014-2015 Elcodi.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @author Aldo Chiecchia <zimage@tiscali.it>
 * @author Elcodi Team <tech@elcodi.com>
 */

namespace Elcodi\Component\Plugin\Services;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class PluginConfiguration
 */
class PluginConfiguration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('plugin');
        $rootNode
            ->children()
                ->scalarNode('type')
                    ->isRequired()
                ->end()
                ->scalarNode('name')
                    ->isRequired()
                ->end()
                ->scalarNode('visible')
                    ->defaultTrue()
                ->end()
                ->scalarNode('fa_icon')
                ->end()
                ->scalarNode('description')
                ->end()
                ->arrayNode('fields')
                    ->prototype('array')
                        ->children()
                            ->enumNode('type')
                               ->values([
                                   'integer',
                                   'text',
                                   'textarea',
                                   'boolean',
                                   'checkbox',
                                   'radio',
                                   'email',
                                   'password',
                                   'url',
                                   'date',
                                   'datetime',
                                   'time',
                               ])
                            ->end()
                            ->booleanNode('required')
                                ->defaultFalse()
                            ->end()
                            ->scalarNode('data')
                                ->defaultValue(null)
                            ->end()
                            ->scalarNode('label')
                                ->defaultValue(null)
                            ->end()
                            ->arrayNode('options')
                                ->prototype('scalar')
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
