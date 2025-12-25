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
                    ->label('Full name')
                    //   ->hiddenLabel()
                    //  ->disabled()
                    ->dehydrated()
                    ->minLength(1)
                    ->maxLength(55)->unique(ignoreRecord: true),
                TextInput::make('github_url')->required(),
                DatePicker::make('date_of_birth')
                    ->displayFormat(function (): string {
                        // if (auth()->user()->country_id === 'us') {
                        //     return 'm/d/Y';
                        // }

                        return 'd/m/Y';
                    }),

                Select::make('user_id')
                    ->options(function (): array {
                        return User::query()->pluck('name', 'id')->all();
                    }),

                TextInput::make('middle_name')
                // ->required(fn(): bool => auth()->user()->hasMiddleName())

            ]);
    }
}
