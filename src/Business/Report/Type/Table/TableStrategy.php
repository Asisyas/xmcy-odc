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

namespace App\Business\Report\Type\Table;

use App\Business\Report\Type\ReportTypeStrategyInterface;
use App\Business\Report\Type\Table\Expander\TableReportExpanderInterface;
use App\Facade\History\HistoryFacadeInterface;
use App\Model\Form\HistoricalQuotesQueryInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class TableStrategy implements ReportTypeStrategyInterface
{
    /**
     * @param HistoryFacadeInterface $historyFacade
     * @param iterable<TableReportExpanderInterface> $tableReportExpanderCollection
     */
    public function __construct(
        private readonly HistoryFacadeInterface $historyFacade,
        private readonly iterable $tableReportExpanderCollection
    )
    {
    }

    /**
     * TODO: try/catch - simple implements. Should be updated !!!
     *
     * {@inheritDoc}
     */
    public function execute(HistoricalQuotesQueryInterface $historicalQuotesQuery): array
    {
        try {
            $history = $this->historyFacade->receiveHistory($historicalQuotesQuery);
        } catch (\Exception $exception) {
            return [];
        }

        $result = [];
        foreach ($this->tableReportExpanderCollection as $expander) {
            $expander->expand($result, $history, $historicalQuotesQuery);
        }

        return $result;
    }
}
