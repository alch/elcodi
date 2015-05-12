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

namespace Elcodi\Component\Plugin\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class PluginRepository
 */
class PluginRepository extends EntityRepository
{
    /**
     * Find certain type plugins
     *
     * @param string $type Plugin type
     *
     * @return array All installed plugins from certain type
     */
    public function getTypesFromType($type)
    {
        return $this->findBy([
            'type' => $type,
            'enabled' => true,
        ]);
    }
}
