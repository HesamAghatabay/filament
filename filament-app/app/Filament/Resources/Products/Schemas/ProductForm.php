<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->default(null),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('category_id')
                    ->numeric()
                    ->default(null),
                Toggle::make('is_visible'),
            ]);
    }
}
