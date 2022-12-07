<?php
/**
 * This file is part of the XMCY-ODC PHP Exercise - v21.0.5.
 *
 * (c) Stanislau Komar <stanislau_komar@epam.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Business\Company\Search;

use App\Model\Company\CompanyInterface;

/**
 * Simple search by company.
 *
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
interface SearchEngineInterface
{
    /**
     * @param string $query
     *
     * @return iterable<CompanyInterface>
     */
    public function search(string $query): iterable;
}
