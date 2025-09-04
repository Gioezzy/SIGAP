<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KritikSaranResource\Pages;
use App\Models\KritikSaran;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use FIlament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class KritikSaranResource extends Resource
{
    protected static ?string $model = KritikSaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center';

    protected static ?string $navigationLabel = 'Kritik & Saran';

    protected static ?string $pluralModelLabel = 'Daftar Kritik & Saran Masuk';

    public static function getNavigationGroup(): ?string
    {
        return 'Kritik & Saran';
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
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('Nama Pengguna')
                    ->sortable()
                    ->searchable()
                    ->wrap(),
                TextColumn::make('judul')
                    ->label('Judul Kritik & Saran')
                    ->sortable()
                    ->searchable()
                    ->wrap(),
                TextColumn::make('isi')
                    ->label('Isi Kritik & Saran')
                    ->sortable()
                    ->searchable()
                    ->wrap(),
                TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Tanggal Diperbarui')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->searchable()
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
                    ->url(fn ($record) => TanggapanKritikSaranResource::getUrl('create', [
                        'id_kritiksaran' => $record->id,
                    ])),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
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
        return false; // Disable create action for Kritik & Saran
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKritikSarans::route('/'),
            'create' => Pages\CreateKritikSaran::route('/create'),
            'edit' => Pages\EditKritikSaran::route('/{record}/edit'),
        ];
    }
}
