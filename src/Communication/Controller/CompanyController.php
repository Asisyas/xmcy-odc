<?php

namespace App\Communication\Controller;

use App\Facade\Company\CompanyFacadeInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompanyController extends AbstractController
{
    public function __construct(
        private readonly CompanyFacadeInterface $companyFacade
    )
    {

    }

    /**
     * TODO: Temporal solution. Should be implements specific serialization group for CompanyInterface
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
