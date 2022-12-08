<?php
/**
 * This file is part of the XMCY-ODC PHP Exercise - v21.0.5.
 *
 * (c) Stanislau Komar <stanislau_komar@epam.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Business\Report\Type;

use App\Model\Form\HistoricalQuotesQueryInterface;

/**
 * TODO: Union ChartExpander and Table expander interfaces
 *
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
interface ReportTypeStrategyInterface
{
    /**
     * @param HistoricalQuotesQueryInterface $historicalQuotesQuery
     *
     * @return array
     */
    public function execute(HistoricalQuotesQueryInterface $historicalQuotesQuery): array;
}
