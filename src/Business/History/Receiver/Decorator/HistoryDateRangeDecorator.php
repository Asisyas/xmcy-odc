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

namespace App\Business\History\Receiver\Decorator;

use App\Business\History\Receiver\HistoryDateRangeReceiverInterface;
use App\Business\History\Receiver\HistoryReceiverInterface;
use App\Exception\History\HistoryDateRangeNotFoundException;
use App\Model\History\HistoryInterface;
use App\Model\History\HistoryTransfer;
use Symfony\Component\DependencyInjection\Attribute\AsDecorator;

/**
 * TODO: Bug with decorate HistoryReceiverInterface::class. Switch to decorate CachedHistoryReceiver::class
 *
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
#[AsDecorator(decorates: CachedHistoryReceiver::class, priority: 10)]
class HistoryDateRangeDecorator implements HistoryDateRangeReceiverInterface
{
    /**
     * @param HistoryReceiverInterface $decorated
     */
    public function __construct(private readonly HistoryReceiverInterface $decorated)
    {
    }

    /**
     * Simple filter solution.
     *
     * @param string $symbol
     * @param string|null $region
     * @param \DateTime|null $dateFrom
     * @param \DateTime|null $dateTo
     *
     * @return HistoryInterface
     */
    public function receiveHistory(string $symbol, ?string $region = null, \DateTime $dateFrom = null, \DateTime $dateTo = null): HistoryInterface
    {
        $history = $this->decorated->receiveHistory($symbol, $region);
        if(
            !($history instanceof HistoryTransfer) ||
            !$dateFrom && !$dateTo
        ) {
            return $history;
        }

        $prices = [];
        foreach ($history->getPrices() as $price) {
            $pd = $price->getDate();
            if($dateFrom && $pd < $dateFrom->setTime(23, 59)) {
                continue;
            }

            if($dateTo && $pd > $dateTo->setTime(23, 59)) {
                continue;
            }

            $prices[] = $price;
        }

        if(!$prices) {
            throw new HistoryDateRangeNotFoundException(
                $symbol,
                $dateFrom,
                $dateTo
            );
        }

        $history->setPrices($prices);

        return $history;
    }
}
