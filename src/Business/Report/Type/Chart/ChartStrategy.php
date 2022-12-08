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

namespace App\Business\Report\Type\Chart;

use App\Business\Report\Type\Chart\Expander\ChartReportExpanderInterface;
use App\Business\Report\Type\ReportTypeStrategyInterface;
use App\Facade\History\HistoryFacadeInterface;
use App\Model\Form\HistoricalQuotesQueryInterface;

/**
 * TODO: Union with TableStrategy. Code duplicated !
 *
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class ChartStrategy implements ReportTypeStrategyInterface
{

    /**
     * @param HistoryFacadeInterface $historyFacade
     * @param iterable<ChartReportExpanderInterface> $chartReportExpanderCollection
     */
    public function __construct(
        private readonly HistoryFacadeInterface $historyFacade,
        private readonly iterable $chartReportExpanderCollection
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function execute(HistoricalQuotesQueryInterface $historicalQuotesQuery): array
    {
        $history = $this->historyFacade->receiveHistory($historicalQuotesQuery);
        if(!$history->getPrices()) {
            return [];
        }

        $results = [];

        foreach ($this->chartReportExpanderCollection as $expander) {
            $expander->expand($results, $history, $historicalQuotesQuery);
        }

        return $results;
    }
}
