<?php

namespace App\Twig\Runtime\Reports;

use Twig\Environment;
use Twig\Extension\RuntimeExtensionInterface;

class ReportRenderExtensionRuntime implements RuntimeExtensionInterface
{
    /**
     * {@inheritDoc}
     */
    public function renderReports(Environment $environment, array $reports)
    {
        return $environment->render('twig/report/report.html.twig', [
            'reports'   => $reports,
        ]);
    }
}
