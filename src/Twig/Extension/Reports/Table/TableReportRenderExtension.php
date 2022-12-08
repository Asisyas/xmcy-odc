<?php

namespace App\Twig\Extension\Reports\Table;

use App\Twig\Runtime\Reports\Table\TableReportRenderExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TableReportRenderExtension extends AbstractExtension
{
    /**
     * {@inheritDoc}
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('report_render_table', [TableReportRenderExtensionRuntime::class, 'render'], [
                'is_safe'   => ['html'],
                'needs_environment' => true,
            ]),
        ];
    }
}
