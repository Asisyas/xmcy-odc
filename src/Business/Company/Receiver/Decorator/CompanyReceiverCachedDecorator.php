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

namespace App\Business\Company\Receiver\Decorator;

use App\Business\Company\Receiver\CompanyReceiverInterface;
use Symfony\Contracts\Cache\TagAwareCacheInterface;

use Symfony\Component\DependencyInjection\Attribute\AsDecorator;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
#[AsDecorator(decorates: CompanyReceiverInterface::class)]
class CompanyReceiverCachedDecorator implements CompanyReceiverInterface
{
    const CACHE_KEY = 'cmpns';

    public function __construct(
        private readonly CompanyReceiverInterface $companyReceiver,
        private readonly TagAwareCacheInterface $companyPool
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function receiveCompanyCollection(): iterable
    {
        return $this->companyPool->get(self::CACHE_KEY, function() {
            return $this->companyReceiver->receiveCompanyCollection();
        });
    }
}
