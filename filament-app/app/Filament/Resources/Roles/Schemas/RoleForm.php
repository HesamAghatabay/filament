<?php

namespace App\Filament\Resources\Roles\Schemas;

use App\Models\User;
use BladeUI\Icons\Components\Icon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Role name')
                    ->minLength(1)
                    ->maxLength(55)->unique(ignoreRecord: true),

            ]);
    }
}
