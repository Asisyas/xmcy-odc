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

namespace App\Business\Company\Search\Default\Strategy;

use App\Model\Company\CompanyInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class SymbolWildcard implements SearchStrategyInterface
{
    /**
     * {@inheritDoc}
     */
    public function apply(CompanyInterface $company, string $query): bool
    {
        return fnmatch(mb_strtoupper($query), $company->getSymbol());
    }
}
