<?php

declare(strict_types=1);

namespace Mortezaa97\Regions\Filament\Resources\Counties\Schemas;

use Filament\Schemas\Schema;

class CountyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            \Filament\Schemas\Components\Group::make()
                ->schema([
                    \Filament\Schemas\Components\Section::make()
                        ->schema([
                            \App\Filament\Components\Form\NameTextInput::create()->required(),
                            \Filament\Forms\Components\TextInput::make('province_id')->required(),
                            \App\Filament\Components\Form\LatTextInput::create(),
                            \App\Filament\Components\Form\LongTextInput::create(),
                            \App\Filament\Components\Form\ImageFileUpload::create(),

                        ])
                        ->columns(12)
                        ->columnSpan(12),
                ])
                ->columns(12)
                ->columnSpan(8),
            \Filament\Schemas\Components\Group::make()
                ->schema([
                    \Filament\Schemas\Components\Section::make()
                        ->schema([])
                        ->columns(12)
                        ->columnSpan(12),
                ])
                ->columns(12)
                ->columnSpan(4),
        ])
            ->columns(12);
    }
}
