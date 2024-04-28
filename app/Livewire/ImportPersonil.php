<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImportPersonil extends Component
{

    use WithFileUploads;
    #[Validate(['file' => 'required|mimes:xlsx,xls'])]
    public $file;
    public function handleImport()
    {
        dd($this->file);
    }
    public function render()
    {
        return view('livewire.import-personil');
    }
}
