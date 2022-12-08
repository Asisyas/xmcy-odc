<?php

namespace App\Twig\Extension\Reports;

use App\Twig\Runtime\Reports\ReportRenderExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ReportRenderExtensionExtension extends AbstractExtension
{
    /**
     * {@inheritDoc}
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('reports_render', [ReportRenderExtensionRuntime::class, 'renderReports'], [
                'is_safe'   => ['html'],
                'needs_environment' => true,
            ]),
        ];
    }
}
