<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuruResource\Pages;
use App\Filament\Resources\GuruResource\RelationManagers;
use App\Models\Guru;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;

    protected static ?string $navigationLabel = 'Data Guru';
    protected static ?string $pluralLabel = 'Daftar Data Guru';

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap'; //ganti icon

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Grid::make(2) 
                ->schema([
                    Forms\Components\TextInput::make('nama') //nama
                        ->label('Nama')             //diatas form
                        ->placeholder('Nama Guru')  //dalam form
                        ->required(),               //wajib diisi

                    Forms\Components\TextInput::make('nip') //nip
                        ->label('NIP')
                        ->placeholder('NIP Guru')
                        ->unique(ignoreRecord: true)
                        ->validationMessages([      //error message
                            'unique' => 'NIP sudah digunakan'
                        ])
                        ->required(),

                    Forms\Components\Select::make('gender') //Select untuk dropdown
                        ->label('Jenis Kelamin')
                        ->options([             //pilihan dropdown
                            'L' => 'Laki-Laki', //L & P mengikuti apa yg sudah diset di database
                            'P' => 'Perempuan',
                        ])
                        ->native(false)         //nonactive dropdown default browser
                        ->columnspan(2)         //karena grid 2, ini artinya dia akan ambil 2 grid jadi dia melebar sesuai form ga terbagi
                        ->required(),

                    Forms\Components\TextInput::make('email')
                        ->label('Email')
                        ->placeholder('Email Guru')
                        ->email()               //mengatur input type="email" dan validasi email otomatis
                        ->unique(ignoreRecord: true)
                        ->validationMessages([
                            'unique' => 'Email sudah digunakan',
                        ])
                        ->required(),

                    Forms\Components\TextInput::make('kontak')
                        ->label('Kontak')
                        ->placeholder('Kontak Guru')
                        ->required(),

                    Forms\Components\TextInput::make('alamat')
                        ->label('Alamat')
                        ->placeholder('Alamat Guru')
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
                ->getStateUsing(fn ($record) => guru::orderBy('id')->pluck('id') //ambil semua id dari tabel guru
                ->search($record->id) + 1), //mencari index dari id berdasarkan yang diambil diatas, karena index dimulai dari 0 maka +1

                Tables\Columns\TextColumn::make('nama')
                ->label('Nama')
                ->searchable()
                ->sortable(),
                
                Tables\Columns\TextColumn::make('nip')
                ->label('NIP')
                ->searchable()
                ->sortable(),
                
                Tables\Columns\TextColumn::make('gender')
                ->label('Jenis Kelamin')
                ->formatStateUsing(fn ($state) => [ //ubah tampilan supaya yang tampil di tabel itu Laki, bukan L doang
                    'L' => 'Laki-Laki', 
                    'P' => 'Perempuan',
                ][$state] ?? '-')
                ->searchable()
                ->sortable(),
                
                Tables\Columns\TextColumn::make('email')
                ->label('Email')
                ->searchable()
                ->sortable(),
                
                Tables\Columns\TextColumn::make('kontak')
                ->label('Kontak')
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
                        ->before(function ($record, $action) {
                            if ($record->pkls()->exists()) {
                                \Filament\Notifications\Notification::make()
                                    ->title('Gagal Menghapus')
                                    ->body("Guru {$record->nama} masih aktif PKL.")
                                    ->danger()
                                    ->send();

                                $action->cancel(); // Hentikan proses hapus tanpa error
                            }
                        }),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->before(function ($records, $action) {
                            foreach ($records as $record) {
                                // Cek apakah Guru masih memiliki hubungan dengan data PKL
                                if ($record->pkls()->exists()) {
                                    \Filament\Notifications\Notification::make()
                                        ->title('Gagal Menghapus')
                                        ->body("Guru {$record->nama} masih memiliki data PKL terkait.")
                                        ->danger()
                                        ->send();

                                    $action->cancel(); // Batalkan penghapusan tanpa error
                                    return; // Keluar dari loop untuk menghentikan proses lebih lanjut
                                }
                            }
                        }),
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
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'view' => Pages\ViewGuru::route('/{record}'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }
}