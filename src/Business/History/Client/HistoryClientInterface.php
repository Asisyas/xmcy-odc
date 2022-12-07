<?php
/**
 * This file is part of the XMCY-ODC PHP Exercise - v21.0.5.
 *
 * (c) Stanislau Komar <stanislau_komar@epam.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Business\History\Client;

use App\Model\Form\HistoricalQuotesQueryInterface;
use App\Model\History\HistoryInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
interface HistoryClientInterface
{
    /**
     * @param HistoricalQuotesQueryInterface $historicalQuotesQuery
     *
     * @return iterable<HistoryInterface>
     */
    public function receiveHistory(HistoricalQuotesQueryInterface $historicalQuotesQuery): HistoryInterface;
}
