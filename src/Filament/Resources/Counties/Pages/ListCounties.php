<?php

declare(strict_types=1);

namespace Mortezaa97\Regions\Filament\Resources\Counties\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Mortezaa97\Regions\Filament\Resources\Counties\CountyResource;

class ListCounties extends ListRecords
{
    protected static string $resource = CountyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
