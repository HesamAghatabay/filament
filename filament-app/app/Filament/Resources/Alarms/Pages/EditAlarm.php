<?php

namespace App\Filament\Resources\Alarms\Pages;

use App\Filament\Resources\Alarms\AlarmResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAlarm extends EditRecord
{
    protected static string $resource = AlarmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
