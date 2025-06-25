<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TanggapanKritikSaranResource\Pages;
use App\Models\TanggapanKritikSaran;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TanggapanKritikSaranResource extends Resource
{
    protected static ?string $model = TanggapanKritikSaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    protected static ?string $navigationLabel = 'Tanggapan Kritik & Saran';

    protected static ?string $pluralModelLabel = 'Daftar Tanggapan Kritik & Saran';

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
                Fieldset::make('Informasi Kritik Saran')
                    ->schema([
                        TextInput::make('judul_kritiksaran')
                            ->label('Judul Kritik & Saran')
                            ->disabled()
                            ->dehydrated(false)
                            ->columnSpanFull(),
                        TextInput::make('nama_pelapor')
                            ->label('Nama Pelapor')
                            ->disabled()
                            ->dehydrated(false)
                            ->columnSpanFull(),
                        TextInput::make('isi_kritiksaran')
                            ->label('Isi Kritik & Saran')
                            ->disabled()
                            ->dehydrated(false)
                            ->columnSpanFull(),
                    ]),
                Fieldset::make('Tanggapan Kritik Saran')
                    ->schema([
                        RichEditor::make('tanggapan')
                            ->label('Tanggapan Kritik & Saran')
                            ->required()
                            ->columnSpanFull(),

                        Hidden::make('id_kritiksaran')
                            ->default(fn() => request()
                                ->query('id_kritiksaran'))
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
                TextColumn::make('kritikSaran.user.name')
                    ->label('Nama Pengguna')
                    ->sortable()
                    ->searchable()
                    ->wrap(),
                TextColumn::make('kritikSaran.judul')
                    ->label('Judul Kritik & Saran')
                    ->sortable()
                    ->searchable()
                    ->wrap(),
                TextColumn::make('kritikSaran.isi')
                    ->label('Isi Kritik & Saran')
                    ->sortable()
                    ->searchable()
                    ->wrap(),
                TextColumn::make('tanggapan')
                    ->label('Tanggapan Kritik Saran')
                    ->sortable()
                    ->searchable()
                    ->html() // Supaya tag <p> atau format HTML dirender dengan benar
                    ->formatStateUsing(fn($state) => \Illuminate\Support\Str::limit($state, 60))
                    ->tooltip(fn($state) => strip_tags($state))
                    ->wrap(),
                TextColumn::make('created_at')
                    ->label('Tanggal Tanggapan')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Tanggal Diperbarui')
                    ->dateTime('d M Y H:i')
                    ->sortable()
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
            'index' => Pages\ListTanggapanKritikSarans::route('/'),
            'create' => Pages\CreateTanggapanKritikSaran::route('/create'),
            'edit' => Pages\EditTanggapanKritikSaran::route('/{record}/edit'),
        ];
    }
}
