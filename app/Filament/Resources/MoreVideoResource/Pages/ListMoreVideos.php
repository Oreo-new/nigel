<?php

namespace App\Filament\Resources\MoreVideoResource\Pages;

use App\Filament\Resources\MoreVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMoreVideos extends ListRecords
{
    protected static string $resource = MoreVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
