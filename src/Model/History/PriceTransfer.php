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
class PriceTransfer implements PriceInterface
{
    #[JMS\Type("DateTime<'U'>")]
    private \DateTime $date;

    private int $open = 0;

    private int $close = 0;

    private int $high = 0;

    private int $low = 0;

    private int $volume = 0;

    private int $adjClose = 0;

    /**
     * {@inheritDoc}
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * {@inheritDoc}
     */
    public function getOpen(): int
    {
        return $this->open;
    }

    /**
     * {@inheritDoc}
     */
    public function getClose(): int
    {
        return $this->close;
    }

    /**
     * {@inheritDoc}
     */
    public function getHigh(): int
    {
        return $this->high;
    }

    /**
     * {@inheritDoc}
     */
    public function getLow(): int
    {
        return $this->low;
    }

    /**
     * {@inheritDoc}
     */
    public function getVolume(): int
    {
        return $this->volume;
    }

    /**
     * {@inheritDoc}
     */
    public function getAdjClose(): int
    {
        return $this->adjClose;
    }
}
