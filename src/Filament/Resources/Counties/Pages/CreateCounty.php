<?php

declare(strict_types=1);

namespace Mortezaa97\Regions\Filament\Resources\Counties\Pages;

use Filament\Resources\Pages\CreateRecord;
use Mortezaa97\Regions\Filament\Resources\Counties\CountyResource;

class CreateCounty extends CreateRecord
{
    protected static string $resource = CountyResource::class;
}
