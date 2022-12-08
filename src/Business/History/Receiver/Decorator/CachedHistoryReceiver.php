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

namespace App\Business\History\Receiver\Decorator;

use App\Business\History\Receiver\HistoryReceiverInterface;
use App\Model\History\HistoryInterface;
use Symfony\Component\DependencyInjection\Attribute\AsDecorator;
use Symfony\Contracts\Cache\TagAwareCacheInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
#[AsDecorator(decorates: HistoryReceiverInterface::class, priority: 0)]
class CachedHistoryReceiver implements HistoryReceiverInterface
{
    /**
     * @param HistoryReceiverInterface $decorated
     * @param TagAwareCacheInterface $historyPool
     */
    public function __construct(
        private readonly HistoryReceiverInterface $decorated,
        private readonly TagAwareCacheInterface $historyPool
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function receiveHistory(string $symbol, ?string $region = null): HistoryInterface
    {
        return $this->historyPool->get(
            $this->createKey($symbol, $region), function () use ($symbol, $region){
                return $this->decorated->receiveHistory($symbol, $region);
            }
        );
    }

    /**
     * @param string $symbol
     * @param string|null $region
     *
     * @return string
     */
    protected function createKey(string $symbol, ?string $region = null): string
    {
        return sprintf('%s_%s', $symbol, $region ?: '');
    }
}
