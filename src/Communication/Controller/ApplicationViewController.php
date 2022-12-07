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

namespace App\Communication\Controller;

use App\Facade\History\HistoryFacadeInterface;
use App\Form\CompanyHistoricalQuotesType;
use App\Model\Form\CompanyHistoricalQuotesFormTransfer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class ApplicationViewController extends AbstractController
{
    public function __construct(
        private readonly HistoryFacadeInterface $historyFacade,
        private readonly ChartBuilderInterface $chartBuilder
    )
    {

    }

    #[Route('/', name: 'index', methods: ['POST', 'GET'])]
    public function index(Request $request): Response
    {
        $historicalQuotesQuery = new CompanyHistoricalQuotesFormTransfer();
        $form = $this->createForm(CompanyHistoricalQuotesType::class, $historicalQuotesQuery);
        $historyCollection = null;
        $chart = null;

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $historyCollection = $this->historyFacade->receiveHistory($historicalQuotesQuery);

            $chart = $this->chartBuilder->createChart(Chart::TYPE_LINE);

            $chart->setData([
                'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                'datasets' => [
                    [
                        'label' => 'My First dataset',
                        'backgroundColor' => 'rgb(255, 99, 132)',
                        'borderColor' => 'rgb(255, 99, 132)',
                        'data' => [0, 10, 5, 2, 20, 30, 45],
                    ],
                ],
            ]);

            $chart->setOptions([
                'scales' => [
                    'y' => [
                        'suggestedMin' => 0,
                        'suggestedMax' => 100,
                    ],
                ],
            ]);


        }

        return $this->render('application_view/index.html.twig', [
            'form' => $form,
            'history_collection'   =>  $historyCollection,
            'history_query' => $historicalQuotesQuery,
            'chart' => $chart,
        ]);
    }
}
