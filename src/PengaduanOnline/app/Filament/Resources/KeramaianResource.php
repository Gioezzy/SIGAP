<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KeramaianResource\Pages;
use App\Filament\Resources\KeramaianResource\RelationManagers;
use App\Models\Keramaian;
use Filament\Tables\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KeramaianResource extends Resource
{
    protected static ?string $model = Keramaian::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationLabel = 'Keramaian';

    protected static ?string $pluralModelLabel = 'Daftar Keramaian';

    public static function getNavigationGroup(): ?string
    {
        return 'Keramaian';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('user.name')
                    ->label('Nama Pengguna')
                    ->searchable()
                    ->wrap(),
                TextColumn::make('nama_acara')
                    ->label('Nama Kegiatan')
                    ->wrap(),
                TextColumn::make('lokasi_acara')
                    ->label('Lokasi Kegiatan')
                    ->wrap(),
                TextColumn::make('tanggal_acara')
                    ->label('Tanggal Kegiatan')
                    ->dateTime('d M Y'),
                TextColumn::make('waktu_acara')
                    ->label('Waktu Kegiatan')
                    ->time(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(function ($state) {
                        $labels = [
                            'menunggu' => 'Menunggu',
                            'disetujui' => 'Desetujui',
                            'ditolak' => 'Ditolak'
                        ];
                        return $labels[$state] ?? $state;
                    })
                    ->colors([
                        'info' => 'menunggu',
                        'success' => 'disetujui',
                        'danger' => 'ditolak'
                    ])
                    ->icons([
                        'heroicon-o-clock' => 'menunggu',
                        'heroicon-o-check-circle' => 'disetujui',
                        'heroicon-o-x-circle' => 'ditolak',
                    ]),

                TextColumn::make('created_at')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Action::make('view')
                    ->label('Respon')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->color('primary')
                    ->url(
                        fn($record) =>
                        TanggapanKeramaianResource::getUrl('create', [
                            'id_keramaian' => $record->id,
                        ])
                    )
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKeramaians::route('/'),
            'create' => Pages\CreateKeramaian::route('/create'),
            'edit' => Pages\EditKeramaian::route('/{record}/edit'),
        ];
    }
}
