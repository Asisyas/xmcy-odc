<?php

declare(strict_types=1);

/**
 * This file is part of the XMCY-ODC PHP Exercise - v21.0.5.
 *
 * (c) Stanislau Komar <stanislau_komar@epam.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Exception\History;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class HistoryNotFoundException extends \RuntimeException
{
    /**
     * @var string
     */
    public readonly string $symbol;

    /**
     * @param string $symbol - Company symbol alias
     *
     * @param \Throwable|null $parent
     */
    public function __construct(string $symbol, \Throwable $parent = null)
    {
        $this->symbol = $symbol;

        parent::__construct(sprintf('History for the symbol "%s" not found.', $symbol), 0, $parent);
    }
}
