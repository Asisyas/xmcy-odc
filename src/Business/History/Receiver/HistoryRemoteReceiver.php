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

namespace App\Business\History\Receiver;

use App\Exception\History\HistoryBadResponseException;
use App\Exception\History\HistoryNotFoundException;
use App\Model\History\HistoryInterface;
use App\Model\History\HistoryTransfer;
use JMS\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class HistoryRemoteReceiver implements HistoryReceiverInterface
{
    /**
     * @param HttpClientInterface $rapidHistoryClient
     * @param SerializerInterface $serializer
     */
    public function __construct(
        private readonly HttpClientInterface $rapidHistoryClient,
        private readonly SerializerInterface $serializer
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function receiveHistory(string $symbol, ?string $region = null): HistoryInterface
    {
        $query = [ 'symbol' => mb_strtoupper($symbol) ];
        if($region !== null) {
            $query['region'] = mb_strtolower($region);
        }

        try {
            $response = $this->rapidHistoryClient->request(
                'GET',
                '/stock/v3/get-historical-data',
                ['query' => $query]
            );
        } catch (\Throwable $throwable) {
            throw new HistoryBadResponseException(
                $throwable->getMessage(), $throwable->getCode(), $throwable
            );
        }

        try {
            $history = $this->serializer->deserialize(
                $response->getContent(),
                HistoryTransfer::class,
                'json'
            );
        } catch (\Throwable $throwable) {
            throw new HistoryNotFoundException($symbol, $throwable);
        }

        if($history === null) {
            throw new HistoryNotFoundException($symbol);
        }

        return $history;
    }
}
