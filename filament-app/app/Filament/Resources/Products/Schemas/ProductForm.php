<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;


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
                TextInput::make('alt'),


                FileUpload::make('image')
                    ->disk('public')
                    ->directory('productImage')
                    ->image() // اطمینان از اینکه فایل آپلود شده حتما عکس است
                    ->imageEditor() // ابزار برش و ویرایش دستی
                    // 1. محدود کردن حجم فایل ورودی (مثلا حداکثر 2 مگابایت)
                    ->maxSize(2048)

                    // 2. تغییر سایز خودکار (Resizing)
                    // اگر عرض تصویر بیشتر از 1024 باشد، آن را به 1024 کاهش می‌دهد
                    ->imageResizeTargetWidth('1024')
                    // اگر ارتفاع بیشتر از 1024 باشد، آن را کاهش می‌دهد
                    ->imageResizeTargetHeight('1024')

                    // 3. نحوه تغییر سایز (معمولاً cover یا contain)
                    ->imageResizeMode('contain'),

                // 4. بهینه‌سازی فرمت (اختیاری - تبدیل خودکار به WebP برای کاهش شدید حجم)
                // ->imagePreviewHeight('250') // فقط برای نمایش زیباتر در فرم,



                Toggle::make('is_visible')->default(false)->dehydrated(true),
                Select::make('categories')
                    ->relationship('categories', 'name')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->required(),


                RichEditor::make('description')->columnSpanFull()
                    ->json(),
                TagsInput::make('tags')
                    ->separator(',')

            ]);
    }
}
