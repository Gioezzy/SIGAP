<?php

namespace App\Filament\Resources\KritikSaranResource\Pages;

use App\Filament\Resources\KritikSaranResource;
use App\Filament\Resources\TanggapanKritikSaranResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateKritikSaran extends CreateRecord
{
    protected static string $resource = KritikSaranResource::class;
    
}
