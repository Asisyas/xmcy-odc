<?php
/**
 * This file is part of the XMCY-ODC PHP Exercise - v21.0.5.
 *
 * (c) Stanislau Komar <stanislau_komar@epam.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Model\History;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
interface HistoryInterface
{
    /**
     * @return iterable<PriceInterface>
     */
    public function getPrices(): iterable;

    /**
     * @return bool
     */
    public function isPending(): bool;

    /**
     * @return \DateTime
     */
    public function getFirstTradeDate(): \DateTime;

    /**
     * @return string|null
     */
    public function getId(): string|null;

    /**
     * @return iterable<EventDataInterface>
     */
    public function getEventsData(): iterable;
}
