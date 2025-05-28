<?php

namespace App\Filament\Resources;

use App\Models\Siswa;
use App\Models\Industri;
use App\Models\Guru;
use App\Filament\Resources\PklResource\Pages;
use App\Filament\Resources\PklResource\RelationManagers;
use App\Models\Pkl;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PklResource extends Resource
{
    protected static ?string $model = Pkl::class;

    protected static ?string $navigationLabel = 'Data PKL';
    protected static ?string $pluralLabel = 'Daftar Data PKL';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Grid::make(2) 
                ->schema([
                    //siswa_id
                    Forms\Components\Select::make('siswa_id') //select for dropdown
                        ->label('Nama Siswa')            
                        ->relationship('siswa', 'nama') //mengambil field name dari tabel siswa, dropdown = field name siswa 
                                                        //model utama(pkl) punya relasi ke model siswa. relasinya App\Models\Pkl
                        ->native(false) //non aktifkan dropdown bawaan       
                        ->columnSpan(2)               
                        // ->unique(table: 'pkls', column: 'siswa_id', ignoreRecord: true)         
                        // ->validationMessages([ //pesan error kalau user masukin nama yg sudah digunakan
                        //     'unique' => 'Siswa ini sudah memiliki data PKL',
                        // ])               
                        ->required(),      

                    //industri_id
                    Forms\Components\Select::make('industri_id')
                        ->label('Nama Industri')            
                        ->relationship('industri', 'nama') //mengambil field name dari tabel industri, dropdown = field name industri 
                        ->native(false)            
                        ->required(),               

                    //guru_id
                    Forms\Components\Select::make('guru_id') 
                        ->label('Nama Guru')            
                        ->relationship('guru', 'nama') //mengambil field name dari tabel industri, dropdown = field name industri 
                        ->native(false)            
                        ->required(),               

                    //mulai pkl
                    Forms\Components\DatePicker::make('mulai') 
                        ->label('Tanggal Mulai PKL')            
                        ->maxDate(now()->addYears(5)) // input maks tanggal hari ini sampai 5 tahun dari hari ini
                        ->required(),               

                    //selesai pkl
                    Forms\Components\DatePicker::make('selesai') 
                        ->label('Tanggal Selesai PKL')            
                        ->maxDate(now()->addYears(5)) // input maks tanggal hari ini sampai 5 tahun dari hari ini
                        ->after('mulai') //tanggal selesai adalah setelah tanggal mulai
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
                ->getStateUsing(fn ($record) => pkl::orderBy('id')->pluck('id') //ambil semua id dari tabel guru
                ->search($record->id) + 1), //mencari index dari id berdasarkan yang diambil diatas, karena index dimulai dari 0 maka +1
                 
                Tables\Columns\TextColumn::make('siswa.nama')
                ->label('Nama Siswa')
                ->searchable(),
                
                Tables\Columns\TextColumn::make('industri.nama')
                ->label('Nama Industri')
                ->searchable(),

                Tables\Columns\TextColumn::make('guru.nama')
                ->label('Nama Guru')
                ->searchable(),

                Tables\Columns\TextColumn::make('mulai')
                ->label('Mulai')
                ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('d M Y')),
                
                Tables\Columns\TextColumn::make('selesai')
                ->label('Selesai')
                ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('d M Y')),

                Tables\Columns\TextColumn::make('durasi')
                ->label('Durasi')
                ->getStateUsing(fn ($record) =>
                    \Carbon\Carbon::parse($record->mulai)->diffInDays(\Carbon\Carbon::parse($record->selesai))
                ),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ]),
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
            'index' => Pages\ListPkls::route('/'),
            'create' => Pages\CreatePkl::route('/create'),
            'view' => Pages\ViewPkl::route('/{record}'),
            'edit' => Pages\EditPkl::route('/{record}/edit'),
        ];
    }
}