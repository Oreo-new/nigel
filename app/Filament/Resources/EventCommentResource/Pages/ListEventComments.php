<?php

namespace App\Filament\Resources\EventCommentResource\Pages;

use App\Filament\Resources\EventCommentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEventComments extends ListRecords
{
    protected static string $resource = EventCommentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
