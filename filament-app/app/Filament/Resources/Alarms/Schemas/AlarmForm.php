<?php

namespace App\Filament\Resources\Alarms\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AlarmForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),

                DateTimePicker::make('alarm')->timezone('Asia/Tehran')
                    ->jalali(weekdaysShort: true)->hasToday()
                    ->required()->jalali(),

                DateTimePicker::make('remindes')->jalali()
                    ->jalali(weekdaysShort: true)->hasToday()
                    ->timezone('Asia/Tehran'),

                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
