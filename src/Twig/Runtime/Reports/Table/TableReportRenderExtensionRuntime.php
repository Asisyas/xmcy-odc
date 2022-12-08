<?php

namespace App\Twig\Runtime\Reports\Table;

use Twig\Environment;
use Twig\Extension\RuntimeExtensionInterface;

class TableReportRenderExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct()
    {
    }

    public function render(Environment $environment, array $tableData)
    {
        return $environment->render('twig/report/table/_view.html.twig', $tableData);
    }
}
