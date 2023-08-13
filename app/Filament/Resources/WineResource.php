<?php

namespace App\Filament\Resources;

use App\Enums\UserRole;
use App\Filament\Resources\WineResource\Pages;
use App\Filament\Resources\WineResource\RelationManagers;
use App\Models\Wine;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class WineResource extends Resource
{
    protected static ?string $model = Wine::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image_src')
                    ->image()
                    ->label('Main Image')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('region')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('vintage')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->postfix('den.'),
                Forms\Components\TextInput::make('wine_type')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('country')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('alcohol_content')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('size_liters')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_src')
                    ->label('Main Image'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('region')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vintage')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('wine_type_name')
                    ->numeric()
                    ->sortable()
                    ->label('Wine type'),
                Tables\Columns\TextColumn::make('country_name')
                    ->numeric()
                    ->sortable()
                    ->label('Country'),
                Tables\Columns\TextColumn::make('alcohol_content')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('size_liters')
                    ->numeric()
                    ->sortable()
                    ->label('Size in liters'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->when(auth()->user()->role->value === UserRole::WINERY->value, function ($query) {
                $query->fromAuthWinery();
            })
            ->latest();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageWines::route('/'),
        ];
    }
}
