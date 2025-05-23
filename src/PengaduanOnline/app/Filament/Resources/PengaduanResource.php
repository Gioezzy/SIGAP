<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengaduanResource\Pages;
use App\Filament\Resources\PengaduanResource\RelationManagers;
use App\Models\Pengaduan;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengaduanResource extends Resource
{
    protected static ?string $model = Pengaduan::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-minus';

    protected static ?string $navigationLabel = 'Daftar Pengaduan Masuk';

    protected static ?string $pluralModelLabel = 'Daftar Pengaduan Masuk';

    public static function getNavigationGroup(): ?string
    {
        return 'Pengaduan';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-inbox-stack';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getColor(): ?string
    {
        return 'primary';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_pelapor')
                    ->label('Nama Pelapor')
                    // ->default(fn($record) => $record->user?->name)
                    ->disabled()
                    ->dehydrated(false),
                TextInput::make('judul')
                    ->label('Judul Pengaduan')
                    ->disabled()
                    ->dehydrated(false),
                TextInput::make('kategori_nama')
                    ->label('Kategori Pengaduan')
                    ->disabled()
                    ->dehydrated(false),
                TextInput::make('isi_pengaduan')
                    ->label('Isi Pengaduan')
                    ->disabled()
                    ->dehydrated(false),
                Select::make('status')
                    ->label('Status Pengaduan')
                    ->options([
                        'menunggu' => 'Menunggu',
                        'proses' => 'Proses',
                        'selesai' => 'Selesai',
                        'ditolak' => 'Ditolak',
                    ])
                    ->required()
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->searchable(),
                TextColumn::make('user.name')
                    ->label('Nama Pelapor')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('judul')
                    ->label('Judul Pengaduan')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('kategori.namaKategori')
                    ->label('Kategori Pengaduan')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('isi_pengaduan')
                    ->label('Isi Pengaduan')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Status Pengaduan')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->colors([
                        'menunggu' => 'gray',
                        'proses' => 'warning',
                        'selesai' => 'success',
                        'ditolak' => 'danger',
                    ]),
                TextColumn::make('created_at')
                    ->label('Tanggal Pengaduan')
                    ->date()
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
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
            'index' => Pages\ListPengaduans::route('/'),
            'create' => Pages\CreatePengaduan::route('/create'),
            'edit' => Pages\EditPengaduan::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('kategori');
    }
}
