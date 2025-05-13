<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KavlingResource\Pages;
use App\Filament\Resources\KavlingResource\RelationManagers;
use App\Models\Kavling;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KavlingResource extends Resource
{
    protected static ?string $model = Kavling::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $navigationGroup = 'Master Data';

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([

                        Forms\Components\Select::make('area_id')
                            ->label('Nama Perumahan')
                            ->relationship('area', 'title')
                            ->required(),

                        //name
                        Forms\Components\TextInput::make('title')
                            ->label('Nama Area')
                            ->placeholder('Nama Area')
                            ->required(),

                        //address
                        Forms\Components\TextInput::make('location')
                            ->label('Address')
                            ->placeholder('Address')
                            ->required(),

                        //description
                        Forms\Components\TextInput::make('description')
                            ->label('Description')
                            ->placeholder('Description')
                            ->required(),

                        Forms\Components\TextInput::make('price')
                            ->label('Price')
                            ->placeholder('Price')
                            ->required(),

                        //image
                        Forms\Components\FileUpload::make('photo')
                            ->label('Foto')
                            ->placeholder('Foto')
                            ->multiple()
                            ->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\ImageColumn::make('photo')->square(),
                Tables\Columns\TextColumn::make('area.title')->searchable(),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('location')->searchable(),
                Tables\Columns\TextColumn::make('price')->numeric(decimalPlaces: 0)->money('IDR', locale: 'id'),
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
            'index' => Pages\ListKavlings::route('/'),
            'create' => Pages\CreateKavling::route('/create'),
            'edit' => Pages\EditKavling::route('/{record}/edit'),
        ];
    }
}
