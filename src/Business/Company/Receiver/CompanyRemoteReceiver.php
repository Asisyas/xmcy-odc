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

namespace App\Business\Company\Receiver;

use App\Model\Company\CompanyTransfer;
use JMS\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class CompanyRemoteReceiver implements CompanyReceiverInterface
{
    /**
     * @param HttpClientInterface $rapidCompanyClient
     * @param SerializerInterface $serializer
     */
    public function __construct(
        private readonly HttpClientInterface $rapidCompanyClient,
        private readonly SerializerInterface $serializer
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function receiveCompanyCollection(): iterable
    {
        $resource = $this->rapidCompanyClient->request(
            'GET',
            '/core/nasdaq-listings/nasdaq-listed_json/data/a5bc7580d6176d60ac0b2142ca8d7df6/nasdaq-listed_json.json'
        );

        return $this->serializer->deserialize(
            $resource->getContent(),
            sprintf('iterable<%s>', CompanyTransfer::class),
            'json'
        );
    }
}
