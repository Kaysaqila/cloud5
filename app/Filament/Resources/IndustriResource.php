<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IndustriResource\Pages;
use App\Filament\Resources\IndustriResource\RelationManagers;
use App\Models\Industri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IndustriResource extends Resource
{
    protected static ?string $model = Industri::class;

    protected static ?string $navigationLabel = 'Data Industri';
    protected static ?string $pluralLabel = 'Daftar Data Industri';

    protected static ?string $navigationIcon = 'heroicon-o-building-office'; //ganti icon

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2) 
                    ->schema([
                        Forms\Components\TextInput::make('nama') 
                            ->label('Nama')                 
                            ->placeholder('Nama Industri')  
                            ->required(),                   
                            
                        Forms\Components\TextInput::make('bidang_usaha') 
                            ->label('Bidang Usaha')                 
                            ->placeholder('Bidang Usaha')
                            ->required(),                                  
                            
                        Forms\Components\TextInput::make('alamat') 
                            ->label('Alamat')                 
                            ->placeholder('Alamat Industri')  
                            ->columnspan(2)
                            ->required(),                   
                            
                        Forms\Components\TextInput::make('kontak') 
                            ->label('Kontak')                 
                            ->placeholder('Kontak Industri')  
                            ->required(),                   
                            
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->placeholder('Email Industri')
                            ->email()               //mengatur input type="email" dan validasi email otomatis
                            ->unique(ignoreRecord: true)
                            ->validationMessages([
                                'unique' => 'Email sudah digunakan',
                            ])
                            ->required(),                 

                        Forms\Components\TextInput::make('website') 
                            ->label('Website')                 
                            ->placeholder('Website Industri')  
                            ->url() //validasi berupa url
                            ->columnspan(2)
                            ->required(),   
                    ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->label('ID')
                ->getStateUsing(fn ($record) => industri::orderBy('id')->pluck('id') //ambil semua id dari tabel guru
                ->search($record->id) + 1),

                Tables\Columns\TextColumn::make('nama')
                ->label('Nama')
                ->searchable()
                ->sortable(),

                Tables\Columns\TextColumn::make('bidang_usaha')
                ->label('Bidang Usaha')
                ->searchable()
                ->limit(30)
                ->sortable(),

                Tables\Columns\TextColumn::make('website')
                ->label('Website')
                ->searchable()
                ->sortable(),

                Tables\Columns\TextColumn::make('kontak')
                ->label('Kontak')
                ->searchable()
                ->sortable(),

                Tables\Columns\TextColumn::make('email')
                ->label('Email')
                ->searchable()
                ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()
                    ->action(function ($record) { // ini hapus per item
                        static::deleteIndustri($record);
                    })
                ]),
            ])
            ->bulkActions([
                    Tables\Actions\DeleteBulkAction::make()
                        ->action(function (\Illuminate\Support\Collection $records){
                            //ini cara hapusnya dari select box yah
                            foreach ($records as $record){
                                static::deleteIndustri($record);
                            }
                        })
                ]);
    }

    protected static function deleteIndustri($record){
        if($record->pkls()->exists()){
            \Filament\Notifications\Notification::make()
                ->title('Gagal menghapus industri')
                ->body('Industri ini masih digunakan untuk PKL')
                ->danger()
                ->send();
            return false;
        }

        $record->delete();
        \Filament\Notifications\Notification::make()
            ->title('Berhasil menghapus industri')
            ->body('Industri berhasil dihapus')
            ->success()
            ->send();

        return true;
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
            'index' => Pages\ListIndustris::route('/'),
            'create' => Pages\CreateIndustri::route('/create'),
            'view' => Pages\ViewIndustri::route('/{record}'),
            'edit' => Pages\EditIndustri::route('/{record}/edit'),
        ];
    }
}