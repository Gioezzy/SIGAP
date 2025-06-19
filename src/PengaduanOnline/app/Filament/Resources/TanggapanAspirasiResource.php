<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TanggapanAspirasiResource\Pages;
use App\Models\TanggapanAspirasi;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TanggapanAspirasiResource extends Resource
{
    protected static ?string $model = TanggapanAspirasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-oval-left-ellipsis';

    protected static ?string $navigationLabel = 'Tanggapan Aspirasi';

    protected static ?string $pluralModelLabel = 'Daftar Tanggapan Aspirasi';

    public static function getNavigationGroup(): ?string
    {
        return 'Aspirasi';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Informasi Aspirasi')
                    ->schema([
                        TextInput::make('judul_aspirasi')
                            ->label('Judul Aspirasi')
                            ->disabled()
                            ->dehydrated(false)
                            ->columnSpanFull(),
                        TextInput::make('nama_pelapor')
                            ->label('Nama Pelapor')
                            ->disabled()
                            ->dehydrated(false)
                            ->columnSpanFull(),
                        TextInput::make('isi_aspirasi')
                            ->label('Isi Aspirasi')
                            ->disabled()
                            ->dehydrated(false)
                            ->columnSpanFull(),
                    ]),
                Fieldset::make('Tanggapan')
                    ->schema([
                        RichEditor::make('tanggapan')
                            ->label('Tanggapan Aspirasi')
                            ->required()
                            ->columnSpanFull(),

                        Hidden::make('id_aspirasi')
                            ->default(fn () => request()
                                ->query('id_aspirasi'))
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('aspirasi.user.name')
                    ->label('Nama Pengguna')
                    ->sortable()
                    ->searchable()
                    ->wrap(),
                TextColumn::make('aspirasi.judul')
                    ->label('Judul Aspirasi')
                    ->sortable()
                    ->searchable()
                    ->wrap(),
                TextColumn::make('aspirasi.isi')
                    ->label('Isi Aspirasi')
                    ->sortable()
                    ->searchable()
                    ->wrap()
                    ->limit(50),
                TextColumn::make('tanggapan')
                    ->label('Tanggapan Aspirasi')
                    ->sortable()
                    ->searchable()
                    ->wrap()
                    ->limit(50),
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
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make()
                        ->label('Edit Tanggapan')
                        ->icon('heroicon-o-pencil')
                        ->color('primary'),
                    // Tables\Actions\ViewAction::make()
                    //     ->label('Lihat Tanggapan')
                    //     ->icon('heroicon-o-eye')
                    //     ->color('primary'),
                    Tables\Actions\DeleteAction::make()
                        ->label('Hapus Tanggapan')
                        ->icon('heroicon-o-trash')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->successNotificationTitle('Tanggapan berhasil dihapus.'),
                ]),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTanggapanAspirasis::route('/'),
            'create' => Pages\CreateTanggapanAspirasi::route('/create'),
            'edit' => Pages\EditTanggapanAspirasi::route('/{record}/edit'),
        ];
    }
}
