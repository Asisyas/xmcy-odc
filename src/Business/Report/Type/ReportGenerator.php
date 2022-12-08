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

namespace App\Business\Report\Type;

use App\Model\Form\HistoricalQuotesQueryInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class ReportGenerator implements ReportTypeStrategyInterface
{
    /**
     * @var iterable|ReportTypeStrategyInterface[]|array
     */
    private readonly iterable $reportTypeStrategyCollection;

    /**
     * @param iterable<ReportTypeStrategyInterface> $reportTypeStrategyCollection
     */
    public function __construct(iterable $reportTypeStrategyCollection)
    {
        $this->reportTypeStrategyCollection = $reportTypeStrategyCollection instanceof \Traversable ?
            iterator_to_array($reportTypeStrategyCollection) :
            $reportTypeStrategyCollection;
    }

    /**
     * {@inheritDoc}
     */
    public function execute(HistoricalQuotesQueryInterface $historicalQuotesQuery): array
    {
        $reports = [];
        foreach ($this->reportTypeStrategyCollection as $type => $reportStrategy) {
            $reportData = $reportStrategy->execute($historicalQuotesQuery);
            if(!$reportData) {
                continue;
            }

            $reports[$type] = $reportData;
        }

        return $reports;
    }
}
