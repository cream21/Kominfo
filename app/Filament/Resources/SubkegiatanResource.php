<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubkegiatanResource\Pages;
use App\Filament\Resources\SubkegiatanResource\RelationManagers;
use App\Models\Subkegiatan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubkegiatanResource extends Resource
{
    protected static ?string $model = Subkegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kegiatan_id')
                    ->relationship('kegiatan', 'nama_kegiatan')
                    ->required(),
                Forms\Components\TextInput::make('kode_rekening')
                    ->required(),
                Forms\Components\TextInput::make('nama_sub_kegiatan')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kegiatan.nama_kegiatan'),
                Tables\Columns\TextColumn::make('kode_rekening'),
                Tables\Columns\TextColumn::make('nama_sub_kegiatan'),
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
            'index' => Pages\ListSubkegiatans::route('/'),
            'create' => Pages\CreateSubkegiatan::route('/create'),
            'view' => Pages\ViewSubkegiatan::route('/{record}'),
            'edit' => Pages\EditSubkegiatan::route('/{record}/edit'),
        ];
    }
}
