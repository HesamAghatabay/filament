<?php

namespace App\Filament\Resources\Alarms\Pages;

use App\Filament\Resources\Alarms\AlarmResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAlarms extends ListRecords
{
    protected static string $resource = AlarmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
