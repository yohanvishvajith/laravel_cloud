<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehiclesResource\Pages;
use App\Filament\Resources\VehiclesResource\RelationManagers;
use App\Models\Vehicles;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\BooleanColumn;
use App\Models\Vehicle;

class VehiclesResource extends Resource
{
    protected static ?string $model = Vehicles::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('make')
                ->label('Make')
                ->required()
                ->maxLength(50),

            Forms\Components\TextInput::make('model')
                ->label('Model')
                ->required()
                ->maxLength(50),

            Forms\Components\TextInput::make('year')
                ->label('Year')
                ->required()
                ->numeric()
                ->minValue(1900)
                ->maxValue(2100),

            Forms\Components\TextInput::make('color')
                ->label('Color')
                ->nullable()
                ->maxLength(50),

            Forms\Components\TextInput::make('registration_number')
                ->label('Registration Number')
                ->required()
                ->unique()
                ->maxLength(20),

            Forms\Components\TextInput::make('mileage')
                ->label('Mileage')
                ->nullable()
                ->numeric()
                ->minValue(0),

            Forms\Components\TextInput::make('daily_rate')
                ->label('Daily Rate')
                ->required()
                ->numeric()
                ->minValue(0),

            Forms\Components\Toggle::make('is_available')
                ->label('Is Available')
                ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                   // Display the vehicle ID
                   TextColumn::make('vehicle_id')
                   ->label('ID')
                   ->sortable()
                   ->searchable(),

               // Display the make of the vehicle
               TextColumn::make('make')
                   ->label('Make')
                   ->sortable()
                   ->searchable(),

               // Display the model of the vehicle
               TextColumn::make('model')
                   ->label('Model')
                   ->sortable()
                   ->searchable(),

               // Display the year of the vehicle
               TextColumn::make('year')
                   ->label('Year')
                   ->sortable()
                   ->searchable(),

               // Display the color of the vehicle
               TextColumn::make('color')
                   ->label('Color')
                   ->sortable()
                   ->searchable(),

               // Display the registration number of the vehicle
               TextColumn::make('registration_number')
                   ->label('Registration Number')
                   ->sortable()
                   ->searchable(),

               // Display the mileage of the vehicle
               TextColumn::make('mileage')
                   ->label('Mileage')
                   ->sortable()
                   ->searchable(),

               // Display the daily rate of the vehicle
               TextColumn::make('daily_rate')
                   ->label('Daily Rate')
                   ->sortable()
                   ->searchable()
                   ->money('USD'), // Format as currency (optional)

               // Display the availability status of the vehicle
               IconColumn::make('is_available')
                   ->label('Available')
                   ->boolean()
                   ->trueIcon('heroicon-o-check-circle')
                   ->falseIcon('heroicon-o-x-circle'),
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
            'index' => Pages\ListVehicles::route('/'),
            'create' => Pages\CreateVehicles::route('/create'),
            'edit' => Pages\EditVehicles::route('/{record}/edit'),
        ];
    }
}
