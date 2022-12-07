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
interface EventDataInterface
{
    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime;

    /**
     * @return int
     */
    public function getNumerator(): int;

    /**
     * @return int
     */
    public function getDenominator(): int;

    /**
     * @return string
     */
    public function getSplitRatio(): string;

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return string
     */
    public function getData(): string;
}
