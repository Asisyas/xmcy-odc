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

namespace App\Facade\Company;

use App\Business\Company\Client\CompanyClientInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class CompanyFacade implements CompanyFacadeInterface
{
    /**
     * @param CompanyClientInterface $companyClient
     */
    public function __construct(
        private readonly CompanyClientInterface $companyClient
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function receiveAll(): iterable
    {
        return $this->companyClient->receiveAll();
    }

    /**
     * {@inheritDoc}
     */
    public function search(string $query): iterable
    {
        return $this->companyClient->search($query);
    }
}
