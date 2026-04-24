<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Support\Enum;

/**
 * An enum that also defines toArray(), used to test that UnitEnum handling
 * takes precedence over toArray() in Entity::normalizeValue().
 */
enum StateEnum: string
{
    case DRAFT     = 'draft';
    case PUBLISHED = 'published';

    public function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
