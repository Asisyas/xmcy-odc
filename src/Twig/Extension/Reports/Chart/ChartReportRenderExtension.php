<?php

namespace App\Twig\Extension\Reports\Chart;

use App\Twig\Runtime\Reports\Chart\ChartReportRenderExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ChartReportRenderExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('report_render_chart', [ChartReportRenderExtensionRuntime::class, 'render'], [
                'is_safe'   => ['html'],
                'needs_environment' => true,
            ]),
        ];
    }
}
