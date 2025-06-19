<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TanggapanKeramaianResource\Pages;
use App\Models\TanggapanKeramaian;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class TanggapanKeramaianResource extends Resource
{
    protected static ?string $model = TanggapanKeramaian::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope-open';

    protected static ?string $navigationLabel = 'Tanggapan Keramaian';

    protected static ?string $pluralModelLabel = 'Daftar Tanggapan Keramaian';

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
                Fieldset::make('Informasi Laporan Keramaian')
                    ->schema([
                        TextInput::make('nama_pelapor')
                            ->label('Nama Pelapor')
                            ->disabled()
                            ->dehydrated(false),
                        TextInput::make('nama_acara')
                            ->label('Nama Kegiatan')
                            ->disabled()
                            ->dehydrated(false),
                        TextInput::make('lokasi_acara')
                            ->label('Lokasi Kegiatas')
                            ->disabled()
                            ->dehydrated(false),
                        DatePicker::make('tanggal_acara')
                            ->label('Lokasi Kegiatan')
                            ->disabled()
                            ->dehydrated(false)
                            ->displayFormat('d F Y')
                            ->native(false),
                        TextInput::make('waktu_acara')
                            ->label('Waktu Kegiatan')
                            ->disabled()
                            ->dehydrated(false),
                    ])->columns(2),
                Fieldset::make('Tanggapan Petugas')
                    ->schema([
                        RichEditor::make('tanggapan')
                            ->label('Tanggapan Petugas')
                            ->required()
                            ->columnSpanFull(),
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'menunggu' => 'Menunggu',
                                'disetujui' => 'Disetujui',
                                'ditolak' => 'Ditolak',
                            ])
                            ->required()
                            ->columnSpanFull()
                            ->helperText('Status ini akan digunakan untuk menentukan apa pengajuan izin disetujui atau ditolak.'),
                        Hidden::make('id_keramaian')
                            ->default(fn () => request()->query('id_keramaian'))
                            ->required(),
                        Hidden::make('user_id')
                            ->default(fn () => Auth::id())
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('keramaian.user.name')
                    ->label('Nama Pengguna')
                    ->searchable()
                    ->wrap(),
                TextColumn::make('keramaian.nama_acara')
                    ->label('Nama Kegiatan')
                    ->wrap(),
                TextColumn::make('keramaian.lokasi_acara')
                    ->label('Lokasi Kegiatan')
                    ->wrap(),
                TextColumn::make('keramaian.tanggal_acara')
                    ->label('Tanggal Kegiatan')
                    ->dateTime('d M Y'),
                TextColumn::make('keramaian.waktu_acara')
                    ->label('Waktu Kegiatan')
                    ->time(),
                TextColumn::make('tanggapan')
                    ->label('Tanggapan')
                    ->wrap(),
                TextColumn::make('keramaian.status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(function ($state) {
                        $labels = [
                            'menunggu' => 'Menunggu',
                            'disetujui' => 'Desetujui',
                            'ditolak' => 'Ditolak',
                        ];

                        return $labels[$state] ?? $state;
                    })
                    ->colors([
                        'info' => 'menunggu',
                        'success' => 'disetujui',
                        'danger' => 'ditolak',
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
            'index' => Pages\ListTanggapanKeramaians::route('/'),
            'create' => Pages\CreateTanggapanKeramaian::route('/create'),
            'edit' => Pages\EditTanggapanKeramaian::route('/{record}/edit'),
        ];
    }
}
