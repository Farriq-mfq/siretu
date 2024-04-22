<?php

namespace App\Livewire;

use Livewire\Component;

class FilterGuru extends Component
{
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
            $data['personil'] = $this->selectedPersonil;
            $data['start'] = $this->start;
            $data['end'] = $this->end;
        } else if ($this->start && $this->end) {
            $data['start'] = $this->start;
            $data['end'] = $this->end;
        } else if ($this->selectedPersonil) {
            $data['personil'] = $this->selectedPersonil;
        }
        return to_route('presensi-guru', array_merge(['show' => 'filter'], $data));
    }

    public function mount(array $filter, $personil)
    {
        $this->showFilterTanggal = request('show') === 'filter' && request()->has('start') && request()->has('end') ? true : false;
        $this->selectedPersonil = request('show') === 'filter' && request()->has('personil') ? request()->get('personil') : null;
        $this->start = request('show') === 'filter' && request()->has('start') ? request()->get('start') : null;
        $this->end = request('show') === 'filter' && request()->has('end') ? request()->get('end') : null;
        $this->filter = $filter;
        $this->personil = $personil;
    }
    public function render()
    {
        return view('livewire.filter-guru');
    }
}
