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
                ->color('danger'),

            Stat::make('Pengaduan Menunggu', Pengaduan::where('status', 'menunggu')->count())
                ->description('Jumlah laporan masuk yang belum ditanggapi')
                ->color('warning'),

            Stat::make('Pengaduan Diproses', Pengaduan::where('status', 'proses')->count())
                ->description('Jumlah laporan masuk yang sedang diproses')
                ->color('info'),

            Stat::make('Pengaduan Selesai', Pengaduan::where('status', 'selesai')->count())
                ->description('Jumlah pengaduan masuk yang sudah selesai')
                ->color('success'),
        ];
    }
}
