<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TanggapanKehilanganResource\Pages;
use App\Filament\Resources\TanggapanKehilanganResource\RelationManagers;
use App\Models\TanggapanKehilangan;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TanggapanKehilanganResource extends Resource
{
    protected static ?string $model = TanggapanKehilangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-up';

    protected static ?string $navigationLabel = 'Tanggapan Kehilangan';

    protected static ?string $pluralModelLabel = 'Daftar Tanggapan Kehilangan';

    public static function getNavigationGroup(): ?string
    {
        return 'Kehilangan';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_pelapor')
                    ->label('Nama Pelapor')
                    ->disabled()
                    ->dehydrated(false),
                TextInput::make('nama_barang')
                    ->label('Nama Barang')
                    ->disabled()
                    ->dehydrated(false),
                    // ->columnSpanFull(),
                TextInput::make('lokasi_hilang')
                    ->label('Lokasi Kehilangan')
                    ->disabled()
                    ->dehydrated(false),
                    // ->columnSpanFull(),
                // TextInput::make('tanggal_hilang')
                //     ->label('Tanggal Kehilangan')
                //     ->dateTime('d M Y H:i')
                //     ->disabled()
                //     ->dehydrated(false)
                //     ->columnSpanFull(),
                DatePicker::make('tanggal_hilang')
                    ->label('Tanggal Kehilangan')
                    ->disabled()
                    ->dehydrated(false)
                    ->displayFormat('d M Y'),
                    // ->columnSpanFull(),
                // ImageColumn::make('foto')
                //     ->label('Foto Barang')
                //     ->disk('public')
                //     ->path('public/kehilangan')
                //     ->circular()
                //     ->size(100)
                //     ->disablePlaceholder(),
                Textarea::make('deskripsi')
                    ->label('Deskripsi Kehilangan')
                    ->disabled()
                    ->dehydrated(false)
                    ->columnSpanFull(),
                TextArea::make('tanggapan')
                    ->label('Tanggapan Kehilangan')
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->label('Status Pengaduan')
                    ->options([
                        'belum_ditemukan' => 'Belum Ditemukan',
                        'ditemukan' => 'Ditemukan',
                    ])
                    ->required()
                    ->columnSpanFull()
                    ->helperText('Status ini akan menentukan apakah barang yang dilaporkan hilang sudah ditemukan atau belum.'),

                Hidden::make('id_kehilangan')
                    ->default(fn() => request()->query('id_kehilangan'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('kehilangan.user.name')
                    ->label('Nama Pengguna')
                    ->searchable()
                    ->wrap(),
                TextColumn::make('kehilangan.nama_barang')
                    ->label('Nama Barang')
                    ->wrap(),
                TextColumn::make('kehilangan.lokasi_hilang')
                    ->label('Lokasi Kehilangan')
                    ->wrap(),
                TextColumn::make('kehilangan.tanggal_hilang')
                    ->label('Tanggal Kehilangan')
                    ->sortable()
                    ->dateTime('d M Y'),
                TextColumn::make('kehilangan.deskripsi')
                    ->label('Deskripsi Barang')
                    ->wrap(),
                TextColumn::make('tanggapan')
                    ->label('Tanggapan Kehilangan')
                    ->wrap()
                    ->limit(50),
                ImageColumn::make('kehilangan.foto')
                    ->label('Gambar')
                    ->disk('public')
                    ->visibility('public')
                    ->getStateUsing(function ($record) {
                        return $record->kehilangan->foto ? asset('storage/' . $record->kehilangan->foto) : null;
                    })
                    ->size(60)
                    ->square(),
                TextColumn::make('kehilangan.status')
                    ->label('Status Tanggapan')
                    ->badge()
                    ->formatStateUsing(function ($state) {
                        $labels = [
                            'ditemukan' => 'Ditemukan',
                            'belum_ditemukan' => 'Belum Ditemukan',
                        ];
                        return $labels[$state] ?? $state;
                    })
                    ->colors([
                        'success' => 'ditemukan',
                        'danger' => 'belum_ditemukan',
                    ])
                    ->icons([
                        'heroicon-o-check-circle' => 'ditemukan',
                        'heroicon-o-x-circle' => 'belum_ditemukan',
                    ]),
                TextColumn::make('created_at')
                    ->label('Tanggal Tanggapan')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Tanggal Update')
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
                    Tables\Actions\DeleteAction::make()
                        ->label('Hapus Tanggapan')
                        ->icon('heroicon-o-trash')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->successNotificationTitle('Tanggapan berhasil dihapus.'),
                ]),
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


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTanggapanKehilangans::route('/'),
            'create' => Pages\CreateTanggapanKehilangan::route('/create'),
            'edit' => Pages\EditTanggapanKehilangan::route('/{record}/edit'),
        ];
    }
}
