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
class EventDataTransfer implements EventDataInterface
{
    #[JMS\Type("DateTime<'U'>")]
    private \DateTime $date;

    /**
     * @var int
     */
    private int $numerator;

    /**
     * @var int
     */
    private int $denominator;

    /**
     * @var string
     */
    private string $splitRatio;

    /**
     * @var string
     */
    private string $type;

    /**
     * @var string
     */
    private string $data;

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
    public function getNumerator(): int
    {
        return $this->numerator;
    }

    /**
     * {@inheritDoc}
     */
    public function getDenominator(): int
    {
        return $this->denominator;
    }

    /**
     * {@inheritDoc}
     */
    public function getSplitRatio(): string
    {
        return $this->splitRatio;
    }

    /**
     * {@inheritDoc}
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * {@inheritDoc}
     */
    public function getData(): string
    {
        return $this->data;
    }
}
