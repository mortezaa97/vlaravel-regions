<?php

declare(strict_types=1);

namespace Mortezaa97\Regions\Filament\Resources\Provinces\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class ProvincesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \App\Filament\Components\Table\NameTextColumn::create(),
                \App\Filament\Components\Table\IsActiveTextColumn::create(),
                \App\Filament\Components\Table\ImageImageColumn::create(),
                \App\Filament\Components\Table\DeletedAtTextColumn::create(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make()->iconButton()->tooltip('ویرایش'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
