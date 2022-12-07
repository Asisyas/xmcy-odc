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

namespace App\Model\Form;

use App\Validator\Symbol;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class CompanyHistoricalQuotesFormTransfer implements HistoricalQuotesQueryInterface
{
    #[Assert\LessThanOrEqual('today  UTC')]
    #[Assert\NotNull()]
    private \DateTime|null $dateFrom;

    #[Assert\LessThanOrEqual('today UTC')]
    #[Assert\NotNull()]
    private \DateTime|null $dateTo;

    #[Symbol]
    private string $symbol;

    #[Assert\Email]
    private string $email;

    public function __construct()
    {
        $this->dateFrom = new \DateTime('today UTC');
        $this->dateTo = new \DateTime('today UTC');
    }

    /**
     * {@inheritDoc}
     */
    public function getDateFrom(): \DateTime
    {
        return $this->dateFrom;
    }

    /**
     * {@inheritDoc}
     */
    public function setDateFrom(\DateTime $dateFrom = null): static
    {
        $this->dateFrom = $dateFrom;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDateTo(): \DateTime
    {
        return $this->dateTo;
    }

    /**
     * {@inheritDoc}
     */
    public function setDateTo(\DateTime $dateTo = null): static
    {
        $this->dateTo = $dateTo;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * {@inheritDoc}
     */
    public function setSymbol(string $symbol): static
    {
        $this->symbol = $symbol;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }
}
