<?php

namespace App\Livewire\Jurnal;

use App\Models\Jurnal;
use Livewire\Component;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf;

class ButtonPrint extends Component
{
    public $personil;
    public $tanggal;
    public function downloadJurnal()
    {
        $modelJurnal = new Jurnal();
        ;
        $jurnal = $modelJurnal->where('NoTelp', $this->personil)->where('TglFormulir', $this->tanggal)->first();
        if (!$jurnal)
            abort(404);
        $pdf = LaravelMpdf::loadView('jurnal.pdf.generate', compact('jurnal'));
        return response()->streamDownload(function () use ($pdf) {
            $pdf->download();
        }, 'documentname.pdf');
    }

    public function render()
    {
        return view('livewire.jurnal.button-print');
    }
}
