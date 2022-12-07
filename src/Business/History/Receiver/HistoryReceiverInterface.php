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
interface HistoryReceiverInterface
{
    /**
     * @param string $symbol
     * @param string|null $region
     *
     * @return HistoryInterface
     */
    public function receiveHistory(string $symbol, string|null $region = null): HistoryInterface;
}
