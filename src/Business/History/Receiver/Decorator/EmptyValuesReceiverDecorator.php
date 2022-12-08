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

use App\Business\History\Receiver\HistoryReceiverInterface;
use App\Exception\History\HistoryDateRangeNotFoundException;
use App\Model\History\HistoryInterface;
use App\Model\History\HistoryTransfer;
use Symfony\Component\DependencyInjection\Attribute\AsDecorator;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
#[AsDecorator(decorates: HistoryReceiverInterface::class, priority: 10)]
class EmptyValuesReceiverDecorator implements HistoryReceiverInterface
{
    /**
     * @param HistoryReceiverInterface $decorated
     */
    public function __construct(
        private readonly HistoryReceiverInterface $decorated
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function receiveHistory(string $symbol, ?string $region = null): HistoryInterface
    {
        $history = $this->decorated->receiveHistory($symbol, $region);
        if(false === ($history instanceof HistoryTransfer)) {
            return $history;
        }

        $newPrices = [];
        foreach ($history->getPrices() as $price) {
            if(
                !$price->getLow() ||
                !$price->getHigh() ||
                !$price->getOpen() ||
                !$price->getClose()
            ) {
                continue;
            }

            $newPrices[] = $price;
        }

        $history->setPrices($newPrices);

        return $history;
    }
}
