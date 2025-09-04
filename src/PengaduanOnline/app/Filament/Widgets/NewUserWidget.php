<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class NewUserWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    protected function getTableQuery(): Builder
    {
        return User::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->label('Nama Pengguna')
                ->searchable()
                ->sortable(),

            TextColumn::make('email')
                ->label('Email')
                ->copyable()
                ->sortable(),

            TextColumn::make('created_at')
                ->label('Tanggal Daftar')
                ->dateTime('d M Y H:i'),
        ];
    }
}
