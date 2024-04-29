<?php

namespace App\Livewire;

use App\Imports\PersonilImport;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class ImportPersonil extends Component
{

    use WithFileUploads, LivewireAlert;
    public $file;
    public $rules = [
        'file' => 'required|mimes:xlsx, csv, xls'
    ];
    public function handleImport()
    {
        $this->validate();
        try {
            Excel::import(new PersonilImport, $this->file);
            $this->alert('success', 'Berhasil import');
            $this->reset('file');
        } catch (\Exception $e) {
            $this->alert('error', 'Terjadi kesalahan sistem');
        }
    }
    public function render()
    {
        return view('livewire.import-personil');
    }
}
