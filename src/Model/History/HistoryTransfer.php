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

namespace App\Model\History;

use JMS\Serializer\Annotation as JMS;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class HistoryTransfer implements HistoryInterface
{
    #[JMS\Type('string')]
    private readonly string $id;

    #[JMS\Type('iterable<App\Model\History\EventDataTransfer>')]
    private iterable $eventsData;

    #[JMS\Type('iterable<App\Model\History\PriceTransfer>')]
    private iterable $prices;

    #[JMS\Type('bool')]
    private bool $isPending;

    #[JMS\Type("DateTime<'U'>")]
    private \DateTime $firstTradeDate;

    /**
     * {@inheritDoc}
     */
    public function getPrices(): iterable
    {
        return $this->prices;
    }

    /**
     * {@inheritDoc}
     */
    public function isPending(): bool
    {
        return $this->isPending;
    }

    /**
     * {@inheritDoc}
     */
    public function getFirstTradeDate(): \DateTime
    {
        return $this->firstTradeDate;
    }

    /**
     * {@inheritDoc}
     */
    public function getId(): string|null
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function getEventsData(): iterable
    {
        return $this->eventsData;
    }

    /**
     * @param array $prices
     *
     * @return void
     */
    public function setPrices(array $prices): void
    {
       $this->prices = $prices;
    }
}
