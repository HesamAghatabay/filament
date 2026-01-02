<?php

namespace App\Filament\Resources\Alarms;

use App\Filament\Resources\Alarms\Pages\CreateAlarm;
use App\Filament\Resources\Alarms\Pages\EditAlarm;
use App\Filament\Resources\Alarms\Pages\ListAlarms;
use App\Filament\Resources\Alarms\Schemas\AlarmForm;
use App\Filament\Resources\Alarms\Tables\AlarmsTable;
use App\Models\Alarm;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AlarmResource extends Resource
{
    protected static ?string $model = Alarm::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return AlarmForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AlarmsTable::configure($table);
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
            'index' => ListAlarms::route('/'),
            'create' => CreateAlarm::route('/create'),
            'edit' => EditAlarm::route('/{record}/edit'),
        ];
    }
}
