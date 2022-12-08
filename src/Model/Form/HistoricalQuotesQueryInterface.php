<?php
/**
 * This file is part of the XMCY-ODC PHP Exercise - v21.0.5.
 *
 * (c) Stanislau Komar <stanislau_komar@epam.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Model\Form;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
interface HistoricalQuotesQueryInterface
{
    /**
     * @return \DateTime
     */
    public function getDateFrom(): \DateTime;

    /**
     * @return \DateTime
     */
    public function getDateTo(): \DateTime;

    /**
     * @return string
     */
    public function getSymbol(): string;
}
