<?php

namespace App\Livewire\Pkl;

use Livewire\Component;
use App\Models\Pkl; //ini

class View extends Component
{
    public $pkl; //menyimpan data pkl dari database
    public $pklId; //menyimpan id pkl yang diterima dari URL

    //dijalankan otomatis saat komponen di load
    public function mount($id){ //dikirim dari URL yg /viewDataPKl/{id}
        $this->pklId = $id;
        $this->pkl = Pkl::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.pkl.view', [ //mengembalikan view 
            'pkl' => $this->pkl //view akan menerima variabel $pkl, isa diakses di blade
        ]);
    }
}