<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Grid::make()
                ->columns([
                    'sm' => 2,
                    'lg' => 3,
                ])
                ->schema([

                    TextInput::make('name')
                        ->label('نام محصول')
                        ->required()
                        ->columnOrder([
                            'default' => 1,
                            'lg' => 1,
                        ]),

                    TextInput::make('slug')
                        ->label('اسلاگ')
                        ->default(null)
                        ->columnOrder([
                            'default' => 2,
                            'lg' => 2,
                        ]),

                    TextInput::make('alt')
                        ->label('متن جایگزین تصویر')
                        ->columnOrder([
                            'default' => 3,
                            'lg' => 3,
                        ]),

                    FileUpload::make('image')
                        ->label('تصویر محصول')
                        ->disk('public')
                        ->directory('productImage')
                        ->image()
                        ->imageEditor()
                        ->maxSize(2048)
                        ->imageResizeTargetWidth(1024)
                        ->imageResizeTargetHeight(1024)
                        ->imageResizeMode('contain')
                        ->columnSpan([
                            'sm' => 2,
                            'lg' => 1,
                        ])
                        ->columnOrder([
                            'default' => 4,
                            'lg' => 4,
                        ]),

                    Toggle::make('is_visible')
                        ->label('نمایش داده شود؟')
                        ->default(false)
                        ->dehydrated(true)
                        ->columnOrder([
                            'default' => 5,
                            'lg' => 5,
                        ]),

                    Select::make('categories')
                        ->label('دسته‌بندی‌ها')
                        ->relationship('categories', 'name')
                        ->multiple()
                        ->searchable()
                        ->preload()
                        ->required()
                        ->columnSpan([
                            'sm' => 2,
                            'lg' => 2,
                        ])
                        ->columnOrder([
                            'default' => 6,
                            'lg' => 6,
                        ]),

                    RichEditor::make('description')
                        ->label('توضیحات محصول')
                        ->json()
                        ->columnSpanFull()
                        ->columnOrder([
                            'default' => 7,
                            'lg' => 7,
                        ]),

                    TagsInput::make('tags')
                        ->label('تگ‌ها')
                        ->separator(',')
                        ->columnSpan([
                            'sm' => 1,
                            'lg' => 2,
                        ])
                        ->columnOrder([
                            'default' => 8,
                            'lg' => 8,
                        ]),

                    ColorPicker::make('color')
                        ->label('رنگ محصول')
                        ->columnOrder([
                            'default' => 9,
                            'lg' => 9,
                        ]),
                ]),
        ]);
    }
}
