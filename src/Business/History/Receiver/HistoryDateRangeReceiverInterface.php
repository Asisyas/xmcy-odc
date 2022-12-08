<?php
/**
 * This file is part of the XMCY-ODC PHP Exercise - v21.0.5.
 *
 * (c) Stanislau Komar <stanislau_komar@epam.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Business\History\Receiver;

use App\Model\History\HistoryInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
interface HistoryDateRangeReceiverInterface extends HistoryReceiverInterface
{
    /**
     * @param string $symbol
     * @param string|null $region
     * @param \DateTime|null $dateFrom
     * @param \DateTime|null $dateTo
     *
     * @return HistoryInterface
     */
    public function receiveHistory(string $symbol, ?string $region = null, \DateTime $dateFrom = null, \DateTime $dateTo = null): HistoryInterface;
}
