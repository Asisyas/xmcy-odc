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
class ChartDatasetValuesExpander implements ChartReportExpanderInterface
{
    /**
     * {@inheritDoc}
     */
    public function expand(array &$source, HistoryInterface $history, HistoricalQuotesQueryInterface $historicalQuotesQuery): void
    {
        $values = [];
        $min = PHP_INT_MAX;
        $max = 0;
        foreach ($history->getPrices() as $prices) {
            $p = $prices->getOpen();
            $h = $prices->getHigh();
            $l = $prices->getLow();
            $c = $prices->getClose();
            $min = min($min, $p, $h, $l, $c);
            $max = max($min, $p, $h, $l, $c);

            $values[] = [
                'x' => (int)$prices->getDate()->format('U') * 1000,
                'o' => $prices->getOpen(),
                'h' => $prices->getHigh(),
                'l' => $prices->getLow(),
                'c' => $prices->getClose(),
            ];
        }

        $source['datasets'][0]['mm'] = [
            'min'   => $min,
            'max'   => $max,
        ];

        $source['datasets'][0]['data'] = $values;
    }
}
