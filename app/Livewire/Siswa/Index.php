<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Siswa;

class Index extends Component
{
    public $search = '';
    public $selected_abjad =[];
    public $selected_rombel =[];

    public function render()
    {
        $rombels = [
            'SIJA A' => 'SIJA A',
            'SIJA B' => 'SIJA B',
        ];

        $siswas = Siswa::query();

        if (!empty($this->search)){ //cek kalau $this not empty, jadi kalau kolom kosong dia ga filter apa2
            $siswas->where(function($query){ //nge-group semua filter pencarian.
                $query->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('nis', 'like', '%' . $this->search . '%')
                    ->orWhere('alamat', 'like', '%' . $this->search . '%')
                    ->orWhere('kontak', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        //sort abjad
        if ($this->selected_abjad){
            if ($this->selected_abjad === 'Abjad : A-Z'){
                $siswas->orderBy('nama', 'asc'); //ascending, kecil ke besar A-Z 1-100
            } elseif ($this->selected_abjad){
                $siswas->orderBy('nama', 'desc'); //descending, kebalikan
            }
        }

        //sort rombel
        if ($this->selected_rombel){
            $siswas->where('rombel', $this->selected_rombel);
        }

        return view('livewire.siswa.index', [
            'siswas' => $siswas->get(),
            'rombels' => $rombels,
        ]);
    }
}