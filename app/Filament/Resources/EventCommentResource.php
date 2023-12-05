<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventCommentResource\Pages;
use App\Filament\Resources\EventCommentResource\RelationManagers;
use App\Models\EventComment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventCommentResource extends Resource
{
    protected static ?string $model = EventComment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static ?string $navigationLabel = 'News Comments';
    public static ?int $navigationSort = 11;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('comment')->searchable()->sortable()->wrap(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('delete')
                    ->color('danger')
                    ->icon('heroicon-m-trash')
                    ->requiresConfirmation()
                    ->modalHeading('Plese read this before deleting.')
                    ->modalDescription('Are you sure you\'d like to delete this Comment? This cannot be undone. All replies under this comment will be deleted also.')
                    ->action(fn (EventComment $record) => $record->deleteWithReplies())
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListEventComments::route('/'),
            'create' => Pages\CreateEventComment::route('/create'),
            'edit' => Pages\EditEventComment::route('/{record}/edit'),
        ];
    }    
}
