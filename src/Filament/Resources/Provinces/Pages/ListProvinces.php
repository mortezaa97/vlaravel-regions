<?php

declare(strict_types=1);

namespace Mortezaa97\Regions\Filament\Resources\Provinces\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Mortezaa97\Regions\Filament\Resources\Provinces\ProvinceResource;

class ListProvinces extends ListRecords
{
    protected static string $resource = ProvinceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
