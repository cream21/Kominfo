<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PejabatResource\Pages;
use App\Filament\Resources\PejabatResource\RelationManagers;
use App\Models\Pejabat;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PejabatResource extends Resource
{
    protected static ?string $model = Pejabat::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_lengkap')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nip')
                    ->required(),
                Forms\Components\Select::make('jabatan_id')
                    ->relationship('jabatan', 'nama_jabatan')
                    ->required(),
                Forms\Components\Textarea::make('alamat')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Select::make('opd_id')
                    ->relationship('opd', 'nama_opd')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap'),
                Tables\Columns\TextColumn::make('nip'),
                Tables\Columns\TextColumn::make('jabatan.nama_jabatan'),
                Tables\Columns\TextColumn::make('alamat'),
                Tables\Columns\TextColumn::make('opd.nama_opd'),
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
            'index' => Pages\ListPejabats::route('/'),
            'create' => Pages\CreatePejabat::route('/create'),
            'view' => Pages\ViewPejabat::route('/{record}'),
            'edit' => Pages\EditPejabat::route('/{record}/edit'),
        ];
    }
}
