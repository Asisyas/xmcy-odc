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
interface PriceInterface
{
    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime;

    /**
     * @return int
     */
    public function getOpen(): int;

    /**
     * @return int
     */
    public function getClose(): int;

    /**
     * @return int
     */
    public function getHigh(): int;

    /**
     * @return int
     */
    public function getLow(): int;

    /**
     * @return int
     */
    public function getVolume(): int;

    public function getAdjClose(): int;
}
