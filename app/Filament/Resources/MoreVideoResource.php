<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MoreVideoResource\Pages;
use App\Filament\Resources\MoreVideoResource\RelationManagers;
use App\Models\MoreVideo;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns;
use Filament\Tables\Columns\TextColumn;

class MoreVideoResource extends Resource
{
    protected static ?string $model = MoreVideo::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';
    public static ?string $navigationLabel = 'More Videos';
    public static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    TextInput::make('title')->autofocus()->required(),
                    TextInput::make('slug')->disabledOn('edit')
                        ->helperText('Auto generates slug after saving. You may put a unique slug or leave it blank. this field is not editable when its already saved.'),
                    Textarea::make('video_link')->rows(5)->cols(10)->required()
                    ->helperText('Please put the embed code for your video'),
                    RichEditor::make('description')->nullable(),
                    TextInput::make('order')->nullable()->numeric(),
                ])->columns(1)
                        
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')->searchable()
                ->sortable(query: function (Builder $query, string $direction): Builder {
                    return $query
                        ->orderBy('order', 'asc');
                }),
                TextColumn::make('title')->sortable(),
                TextColumn::make('slug'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListMoreVideos::route('/'),
            'create' => Pages\CreateMoreVideo::route('/create'),
            'edit' => Pages\EditMoreVideo::route('/{record}/edit'),
        ];
    }    
}
