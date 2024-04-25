<?php

namespace App\Livewire;

use App\Traits\Select2;
use Livewire\Component;

class FilterPresensi extends Component
{
    use Select2;
    public bool $showFilterTanggal = false;
    public array $filter = [];
    public $personil;
    public $selectedPersonil;
    public $start;
    public $end;
    protected $rules = [
        'end' => 'nullable|after_or_equal:start',
    ];


    public function showFilterTanggalToggle()
    {
        $this->showFilterTanggal = !$this->showFilterTanggal;
        if (!$this->showFilterTanggal) {
            $this->start = null;
            $this->end = null;
        }
    }


    public function filterData()
    {
        $this->validate();
        $data = [];
        if ($this->selectedPersonil && $this->start && $this->end) {
            $data['personil'] = urlencode($this->selectedPersonil);
            $data['start_date'] = $this->start;
            $data['end_date'] = $this->end;
        } else if ($this->start && $this->end) {
            $data['start_date'] = $this->start;
            $data['end_date'] = $this->end;
        } else if ($this->selectedPersonil) {
            $data['personil'] = urlencode($this->selectedPersonil);
        }

        $this->dispatch('to_route', route('presensi', array_merge(['show' => 'filter'], $data)));
    }

    public function mount(array $filter, $personil)
    {
        $this->showFilterTanggal = request('show') === 'filter' && request()->has('start_date') && request()->has('end_date') ? true : false;
        $this->selectedPersonil = request('show') === 'filter' && request()->segment(3) ? urldecode(request()->segment(3)) : null;
        $this->start = request('show') === 'filter' && request()->has('start_date') ? request()->get('start_date') : null;
        $this->end = request('show') === 'filter' && request()->has('end_date') ? request()->get('end_date') : null;
        $this->filter = $filter;
        $this->personil = $personil;
    }
    public function render()
    {
        return view('livewire.filter-presensi');
    }
}
