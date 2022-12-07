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

namespace App\Business\History\Cache;

use App\Business\Cache\Propagator\CachePropagatorInterface;
use App\Business\History\Receiver\HistoryReceiverInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class HistoryCachePropagator implements CachePropagatorInterface
{
    /**
     * @param HistoryReceiverInterface $historyReceiver
     */
    public function __construct(
        private readonly HistoryReceiverInterface $historyReceiver
    )
    {

    }

    public function propagate(): void
    {
        //TODO:
    }
}
