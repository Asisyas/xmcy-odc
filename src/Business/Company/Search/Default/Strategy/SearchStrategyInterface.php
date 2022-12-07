<?php
/**
 * This file is part of the XMCY-ODC PHP Exercise - v21.0.5.
 *
 * (c) Stanislau Komar <stanislau_komar@epam.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Business\Company\Search\Default\Strategy;

use App\Model\Company\CompanyInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
interface SearchStrategyInterface
{
    /**
     * @param CompanyInterface $company
     * @param string $query
     *
     * @return bool
     */
    public function apply(CompanyInterface $company, string $query): bool;
}
