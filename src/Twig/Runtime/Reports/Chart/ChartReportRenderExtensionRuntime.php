<?php

namespace App\Twig\Runtime\Reports\Chart;

use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Twig\ChartExtension;
use Twig\Environment;
use Twig\Extension\RuntimeExtensionInterface;

/**
 * @TODO: Basic example for render chart report. Options and chart type should be injected from DI
 *
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
class ChartReportRenderExtensionRuntime implements RuntimeExtensionInterface
{
    /**
     * @param ChartBuilderInterface $chartBuilder
     */
    public function __construct(
        private readonly ChartBuilderInterface $chartBuilder
    )
    {
    }

    /**
     * @param Environment $environment
     * @param array $chartData
     * @return string
     */
    public function render(Environment $environment, array $chartData): string
    {
        $mm = $chartData['datasets'][0]['mm'];
        $min = $mm['min'];
        $max = $mm['max'];


        $chart = $this->chartBuilder
            ->createChart('candlestick')
            ->setData($chartData)
            ->setOptions([
                'responsive'    => true,
                'maintainAspectRatio' => true,
                'plugins'   => [
                    'tooltip' => [
                        'enabled'   => false,
                        'yAlign'    => 'center',
                        'xAlign'    => 'right',
                    ]
                ],
                'scales' => [
                    'y' => [
                        'min' => $min, // Calc in expander.
                        'max' => $max % 10 ? ($max + 10 - $max % 10) : $max,
                        'stacked'   => true,
                    ],
                    'x' => [
                        'ticks' => [
                            'min' => 0,
                            'stacked'   => true,
                        ]
                    ]
                ],
            ])
        ;

        return  $environment->getExtension(ChartExtension::class)->renderChart(
            $environment,
            $chart,
        );
    }
}
