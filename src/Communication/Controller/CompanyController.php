<?php

namespace App\Communication\Controller;

use App\Facade\Company\CompanyFacadeInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class CompanyController extends AbstractController
{
    /**
     * @param CompanyFacadeInterface $companyFacade
     */
    public function __construct(
        private readonly CompanyFacadeInterface $companyFacade
    )
    {

    }

    /**
     * TODO: Temporal solution. Should be implements specific serialization group for CompanyInterface
     * TODO: Remove all calculations from the controller. It should be calculated in an specific search decorators.
     *
     * @see https://symfony.com/bundles/ux-autocomplete/current/index.html
     *
     * @param Request $request
     *
     * @return Response
     */
    #[Route('/companies', name: 'app_communication_company')]
    public function index(Request $request): Response
    {
        $query = $request->get('query', '*');
        $companies = $this->companyFacade->search($query);
        $result = [];
        $limit = 10;
        $i = 0;
        foreach ($companies as $company) {
            if(++$i > $limit) {
                break;
            }

            $result[] = [
                'value' => $company->getSymbol(),
                'text'  => sprintf('[%s] %s', $company->getSymbol(), $company->getCompanyName())
            ];
        }

        return new JsonResponse([
            'results'   => $result
        ]);
    }
}
