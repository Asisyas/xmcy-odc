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

namespace App\Facade\Reports;

use App\Business\Report\Type\ReportTypeStrategyInterface;
use App\Model\Form\HistoricalQuotesQueryInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class ReportsGeneratorFacade implements ReportsGeneratorFacadeInterface
{
    /**
     * @param ReportTypeStrategyInterface $reportTypeStrategy
     */
    public function __construct(
        private readonly ReportTypeStrategyInterface $reportTypeStrategy
    )
    {
    }

    /**
     * @param HistoricalQuotesQueryInterface $historicalQuotesQuery
     *
     * @return array
     */
    public function generateReports(HistoricalQuotesQueryInterface $historicalQuotesQuery): array
    {
        return $this->reportTypeStrategy->execute($historicalQuotesQuery);
    }
}
