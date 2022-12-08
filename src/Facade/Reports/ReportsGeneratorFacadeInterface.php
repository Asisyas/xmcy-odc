<?php
/**
 * This file is part of the XMCY-ODC PHP Exercise - v21.0.5.
 *
 * (c) Stanislau Komar <stanislau_komar@epam.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Facade\Reports;

use App\Model\Form\HistoricalQuotesQueryInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
interface ReportsGeneratorFacadeInterface
{
    /**
     * @param HistoricalQuotesQueryInterface $historicalQuotesQuery
     *
     * @return array
     */
    public function generateReports(HistoricalQuotesQueryInterface $historicalQuotesQuery): array;
}
