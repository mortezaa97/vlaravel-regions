<?php

declare(strict_types=1);

namespace Mortezaa97\Regions\Filament\Resources\Provinces\Pages;

use Filament\Resources\Pages\CreateRecord;
use Mortezaa97\Regions\Filament\Resources\Provinces\ProvinceResource;

class CreateProvince extends CreateRecord
{
    protected static string $resource = ProvinceResource::class;
}
