<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Cars', '15'),
            Stat::make('Available Cars', '2'),
            Stat::make('Under Maintenance', '2'),
            Stat::make('Monthly Income', 'Rs.5000'),
         
        ];
    }
}
