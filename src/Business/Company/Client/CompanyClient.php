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

namespace App\Business\Company\Client;

use App\Business\Company\Receiver\CompanyReceiverInterface;
use App\Business\Company\Search\SearchEngineInterface;
use App\Model\Company\CompanyInterface;

/**
 * TODO:
 *
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class CompanyClient implements CompanyClientInterface
{
    /**
     * @param SearchEngineInterface $searchEngine
     * @param CompanyReceiverInterface $companyReceiver
     */
    public function __construct(
        private readonly SearchEngineInterface $searchEngine,
        private readonly CompanyReceiverInterface $companyReceiver
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function receiveAll(): iterable
    {
        return $this->companyReceiver->receiveCompanyCollection();
    }

    /**
     * {@inheritDoc}
     */
    public function search(string $query): iterable
    {
        return $this->searchEngine->search($query);
    }
}
