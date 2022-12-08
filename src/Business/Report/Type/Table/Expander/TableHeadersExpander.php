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

namespace App\Business\Report\Type\Table\Expander;

use App\Model\Form\HistoricalQuotesQueryInterface;
use App\Model\History\HistoryInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class TableHeadersExpander implements TableReportExpanderInterface
{
    /**
     * {@inheritDoc}
     */
    public function expand(array &$source, HistoryInterface $history, HistoricalQuotesQueryInterface $historicalQuotesQuery): void
    {
        $source['headers'] = [
            'Date', 'Open', 'High', 'Low', 'Close', 'Volume',
        ];
    }
}
