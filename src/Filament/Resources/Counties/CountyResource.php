<?php

declare(strict_types=1);

namespace Mortezaa97\Regions\Filament\Resources\Counties;

use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mortezaa97\Regions\Filament\Resources\Counties\Pages\CreateCounty;
use Mortezaa97\Regions\Filament\Resources\Counties\Pages\EditCounty;
use Mortezaa97\Regions\Filament\Resources\Counties\Pages\ListCounties;
use Mortezaa97\Regions\Filament\Resources\Counties\Schemas\CountyForm;
use Mortezaa97\Regions\Filament\Resources\Counties\Tables\CountiesTable;
use Mortezaa97\Regions\Models\County;
use UnitEnum;

class CountyResource extends Resource
{
    protected static ?string $model = County::class;

    protected static ?string $navigationLabel = 'شهرستان‌ها';

    protected static ?string $modelLabel = 'شهرستان';

    protected static ?string $pluralModelLabel = 'شهرستان‌ها';

    protected static string|null|UnitEnum $navigationGroup = 'تنظیمات';

    public static function form(Schema $schema): Schema
    {
        return CountyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CountiesTable::configure($table);
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
            'index' => ListCounties::route('/'),
            'create' => CreateCounty::route('/create'),
            'edit' => EditCounty::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
