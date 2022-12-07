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
class CompanyHistoricalQuotesFormTransfer
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

    public function getDateFrom(): \DateTime
    {
        return $this->dateFrom;
    }

    public function setDateFrom(\DateTime $dateFrom = null): static
    {
        $this->dateFrom = $dateFrom;

        return $this;
    }

    public function getDateTo(): \DateTime
    {
        return $this->dateTo;
    }

    public function setDateTo(\DateTime $dateTo = null): static
    {
        $this->dateTo = $dateTo;

        return $this;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function setSymbol(string $symbol): static
    {
        $this->symbol = $symbol;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }
}