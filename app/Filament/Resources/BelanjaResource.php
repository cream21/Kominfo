<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BelanjaResource\Pages;
use App\Filament\Resources\BelanjaResource\RelationManagers;
use App\Models\Belanja;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BelanjaResource extends Resource
{
    protected static ?string $model = Belanja::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode_rekening')
                    ->required(),
                Forms\Components\Textarea::make('uraian_belanja')
                    ->required()
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_rekening'),
                Tables\Columns\TextColumn::make('uraian_belanja'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListBelanjas::route('/'),
            'create' => Pages\CreateBelanja::route('/create'),
            'view' => Pages\ViewBelanja::route('/{record}'),
            'edit' => Pages\EditBelanja::route('/{record}/edit'),
        ];
    }    
}
