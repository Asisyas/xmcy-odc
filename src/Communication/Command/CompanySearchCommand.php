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

namespace App\Communication\Command;

use App\Business\Company\Search\SearchEngineInterface;
use App\Facade\Company\CompanyFacadeInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class CompanySearchCommand extends Command
{
    public function __construct(
        private readonly CompanyFacadeInterface $companyFacade
    )
    {
        parent::__construct('app:company:search');
    }

    public function configure()
    {
        $this->addArgument('query', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {

        foreach ($this->companyFacade->search($input->getArgument('query')) as $company) {
            dump($company);
        }

        return Command::SUCCESS;
    }
}
