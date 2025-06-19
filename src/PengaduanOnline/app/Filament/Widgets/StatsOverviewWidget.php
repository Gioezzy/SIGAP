<?php

namespace App\Filament\Widgets;

use App\Models\Pengaduan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Pengaduan', Pengaduan::count())
                ->description('Jumlah laporan pengaduan masuk')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('danger'),

        ];
    }
}
