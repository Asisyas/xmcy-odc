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

namespace App\Model\Company;

use JMS\Serializer\Annotation as JMS;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class CompanyTransfer implements CompanyInterface
{
    #[JMS\SerializedName("Company Name")]
    private readonly string $companyName;

    #[JMS\SerializedName("Financial Status")]
    private readonly string $financialStatus;

    #[JMS\SerializedName("Market Category")]
    private readonly string $marketCategory;

    #[JMS\SerializedName("Round Lot Size")]
    private readonly int $roundLotSize;

    #[JMS\SerializedName("Security Name")]
    private readonly string $securityName;

    #[JMS\SerializedName("Symbol")]
    private readonly string $symbol;

    private readonly string $testIssue;

    /**
     * {@inheritDoc}
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * {@inheritDoc}
     */
    public function getFinancialStatus(): string
    {
        return $this->financialStatus;
    }

    /**
     * {@inheritDoc}
     */
    public function getMarketCategory(): string
    {
        return $this->marketCategory;
    }

    /**
     * {@inheritDoc}
     */
    public function getRoundLotSize(): int
    {
        return $this->roundLotSize;
    }

    /**
     * {@inheritDoc}
     */
    public function getSecurityName(): string
    {
        return $this->securityName;
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
    public function getTestIssue(): string
    {
        return $this->testIssue;
    }
}
