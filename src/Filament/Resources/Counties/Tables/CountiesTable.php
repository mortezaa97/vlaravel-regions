<?php

declare(strict_types=1);

namespace Mortezaa97\Regions\Filament\Resources\Counties\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class CountiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \App\Filament\Components\Table\NameTextColumn::create(),
                \App\Filament\Components\Table\ProvinceTextColumn::create(),
                \App\Filament\Components\Table\LatTextColumn::create(),
                \App\Filament\Components\Table\LongTextColumn::create(),
                \App\Filament\Components\Table\ImageImageColumn::create(),
                \App\Filament\Components\Table\DeletedAtTextColumn::create(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
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
