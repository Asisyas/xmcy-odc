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

namespace App\Business\History\Client;

use App\Business\History\Receiver\HistoryReceiverInterface;
use App\Model\Form\HistoricalQuotesQueryInterface;
use App\Model\History\HistoryInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class HistoryClient implements HistoryClientInterface
{
    /**
     * @param HistoryReceiverInterface $historyReceiver
     */
    public function __construct(
        private readonly HistoryReceiverInterface $historyReceiver
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function receiveHistory(HistoricalQuotesQueryInterface $historicalQuotesQuery): HistoryInterface
    {
        return $this->historyReceiver->receiveHistory(
            $historicalQuotesQuery->getSymbol(),
        );
    }
}
