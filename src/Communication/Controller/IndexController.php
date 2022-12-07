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

use App\Business\Company\Receiver\CompanyReceiverInterface;
use App\Business\History\Receiver\HistoryReceiverInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class IndexController extends AbstractController
{
    public function __construct(
        private readonly HistoryReceiverInterface $historyReceiver,
        private readonly CompanyReceiverInterface $companyReceiver
    )
    {
    }

    #[Route('/history/{id}', name: 'history')]
    public function history(Request $request): Response
    {
        dd($this->historyReceiver->receiveHistory($request->get('id')));
        return new JsonResponse($this->historyReceiver->receiveHistory($request->get('id')));
    }

    #[Route('/companies', name: 'companies')]
    public function receiveCompanies(Request $request): Response
    {
        dd($this->companyReceiver->receiveCompanyCollection());
    }
}
