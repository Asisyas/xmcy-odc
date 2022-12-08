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

namespace App\Business\Report\Type\Chart\Expander;

use App\Model\Form\HistoricalQuotesQueryInterface;
use App\Model\History\HistoryInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class ChartDatasetMetaExpander implements ChartReportExpanderInterface
{
    /**
     * // Make configurable ! Inject from DI
     *
     * {@inheritDoc}
     */
    public function expand(array &$source, HistoryInterface $history, HistoricalQuotesQueryInterface $historicalQuotesQuery): void
    {
        if(!array_key_exists('datasets', $source)) {
            $source['datasets'] = [];
        }

        $datasets = [
            'type'  => 'candlestick',
            'label' => $historicalQuotesQuery->getSymbol(),
            'color' => [
                'up'  => 'green',
                'down' => 'red',
                'unchanged' => 'black',
            ],
        ];

        $source['datasets'] = [$datasets]; //array_merge($datasets, $source['datasets']);
    }
}
