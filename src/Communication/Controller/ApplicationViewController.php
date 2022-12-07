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

use App\Form\CompanyHistoricalQuotesType;
use App\Model\Form\CompanyHistoricalQuotesFormTransfer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApplicationViewController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['POST', 'GET'])]
    public function index(Request $request): Response
    {
        $source = new CompanyHistoricalQuotesFormTransfer();
        $form = $this->createForm(CompanyHistoricalQuotesType::class, $source);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $source = $form->getData();
        }

        return $this->render('application_view/index.html.twig', [
            'form' => $form,
        ]);
    }
}
