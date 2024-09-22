<?php

namespace App\Filament\Widgets;

use App\Models\Tobacco;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
class TobaccoChart extends ChartWidget
{
    public function getHeading(): Stat
    {
        return Stat::make('Tütünler', Tobacco::count());
    }

    protected static string $color = 'info';

    protected function getData(): array
    {
        $data = Trend::model(Tobacco::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Tütünler',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),

        ];
    }
    protected function getType(): string
    {
        return 'line';
    }
}
