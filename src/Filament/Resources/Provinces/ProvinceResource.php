<?php

declare(strict_types=1);

namespace Mortezaa97\Regions\Filament\Resources\Provinces;

use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mortezaa97\Regions\Filament\Resources\Provinces\Pages\CreateProvince;
use Mortezaa97\Regions\Filament\Resources\Provinces\Pages\EditProvince;
use Mortezaa97\Regions\Filament\Resources\Provinces\Pages\ListProvinces;
use Mortezaa97\Regions\Filament\Resources\Provinces\Schemas\ProvinceForm;
use Mortezaa97\Regions\Filament\Resources\Provinces\Tables\ProvincesTable;
use Mortezaa97\Regions\Models\Province;
use UnitEnum;

class ProvinceResource extends Resource
{
    protected static ?string $model = Province::class;

    protected static ?string $navigationLabel = 'استان';

    protected static ?string $modelLabel = 'استان';

    protected static ?string $pluralModelLabel = 'استانها';

    protected static string|null|UnitEnum $navigationGroup = 'تنظیمات';

    public static function form(Schema $schema): Schema
    {
        return ProvinceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProvincesTable::configure($table);
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
            'index' => ListProvinces::route('/'),
            'create' => CreateProvince::route('/create'),
            'edit' => EditProvince::route('/{record}/edit'),
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
