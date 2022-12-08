<?php
/**
 * This file is part of the XMCY-ODC PHP Exercise - v21.0.5.
 *
 * (c) Stanislau Komar <stanislau_komar@epam.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Business\Report\Type\Chart\Expander;

use App\Model\Form\HistoricalQuotesQueryInterface;
use App\Model\History\HistoryInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
interface ChartReportExpanderInterface
{
    /**
     * @param array $source
     * @param HistoryInterface $history
     * @param HistoricalQuotesQueryInterface $historicalQuotesQuery
     *
     * @return void
     */
    public function expand(array &$source, HistoryInterface $history, HistoricalQuotesQueryInterface $historicalQuotesQuery): void;
}
