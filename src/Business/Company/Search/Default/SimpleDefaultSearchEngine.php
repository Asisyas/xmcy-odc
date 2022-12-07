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

namespace App\Business\Company\Search\Default;

use App\Business\Company\Receiver\CompanyReceiverInterface;
use App\Business\Company\Search\Default\Strategy\SearchStrategyInterface;
use App\Business\Company\Search\SearchEngineInterface;
use App\Model\Company\CompanyInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class SimpleDefaultSearchEngine implements SearchEngineInterface
{
    /**
     * @param CompanyReceiverInterface $companyReceiver
     * @param iterable $searchStrategyCollection
     */
    public function __construct(
        private readonly CompanyReceiverInterface $companyReceiver,
        private readonly iterable $searchStrategyCollection
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function search(string $query): iterable
    {
        $query = mb_strtoupper($query);

        $companyCollection = $this->companyReceiver->receiveCompanyCollection();
        // Can be yield
        $result = [];

        foreach ($companyCollection as $company) {
            if($this->filter($company, $query)) {
                $result[] =  $company;
            }
        }

        return $result;
    }

    /**
     * @param CompanyInterface $company
     * @param string $query
     *
     * @return bool
     */
    protected function filter(CompanyInterface $company, string $query): bool
    {
        foreach ($this->searchStrategyCollection as $strategy) {
            if($strategy->apply($company, $query))  {
                return true;
            }
        }

        return false;
    }
}
