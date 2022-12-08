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

namespace App\Exception\History;

use App\Business\History\Receiver\HistoryDateRangeReceiverInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class HistoryDateRangeNotFoundException extends HistoryNotFoundException
{
    /**
     * @var \DateTime
     */
    public readonly \DateTime $dateFrom;

    /**
     * @var \DateTime
     */
    public readonly \DateTime $dateTo;

    /**
     * @param string $symbol
     * @param \DateTime $dateFrom
     * @param \DateTime $dateTo
     *
     * @param \Throwable|null $previous
     */
    public function __construct(string $symbol, \DateTime $dateFrom, \DateTime $dateTo, \Throwable $previous = null)
    {
        parent::__construct($symbol, $previous);

        $message = parent::getMessage();

        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;

        $this->message = sprintf(
            '%s Date range: from %s to %s',
            $message,
            $dateFrom->format('d/M/y'),
            $dateTo->format('d/M/y')
        );
    }
}
