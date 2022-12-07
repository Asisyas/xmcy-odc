<?php
/**
 * This file is part of the XMCY-ODC PHP Exercise - v21.0.5.
 *
 * (c) Stanislau Komar <stanislau_komar@epam.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Model\Company;

/**
 * @see https://pkgstore.datahub.io/core/nasdaq-listings/nasdaq-listed_json/data/a5bc7580d6176d60ac0b2142ca8d7df6/nasdaq-listed_json.json
 *
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
interface CompanyInterface
{
    /**
     * @return string
     */
    public function getCompanyName(): string;

    /**
     * @return string
     */
    public function getFinancialStatus(): string;

    /**
     * @return string
     */
    public function getMarketCategory(): string;

    /**
     * @return int
     */
    public function getRoundLotSize(): int;

    /**
     * @return string
     */
    public function getSecurityName(): string;

    /**
     * @return string
     */
    public function getSymbol(): string;

    /**
     * @return string
     */
    public function getTestIssue(): string;
}
