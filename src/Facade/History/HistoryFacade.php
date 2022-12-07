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

namespace App\Facade\History;

use App\Business\History\Client\HistoryClientInterface;
use App\Model\Form\HistoricalQuotesQueryInterface;
use App\Model\History\HistoryInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class HistoryFacade implements HistoryFacadeInterface
{
    /**
     * @param HistoryClientInterface $historyClient
     */
    public function __construct(
        private readonly HistoryClientInterface $historyClient
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function receiveHistory(HistoricalQuotesQueryInterface $historicalQuotesQuery): HistoryInterface
    {
        return $this->historyClient->receiveHistory($historicalQuotesQuery);
    }
}
