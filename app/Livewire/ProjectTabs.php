<?php

namespace App\Livewire;

use App\Models\XpKarya;
use Livewire\Component;

class ProjectTabs extends Component
{
    public $tab = 'desc';
    public $showModal = false;
    public XpKarya $project;
    public $selectedAnggota;

    //Modal
    public function openModal($anggotaId)
    {
        $this->selectedAnggota = \App\Models\XpAnggotaTeam::with('xpUserExpo')->find($anggotaId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedAnggota = null;
    }

    // Tab descripsi atau profil
    public function setTab($value)
    {
        $this->tab = $value;
    }

    // Get Id
    public function mount(XpKarya $project)
    {
        $this->project = $project;
    }

    public function render()
    {
        $karyas = XpKarya::with('xpKategori')
            ->where('dipublikasi', 1)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        return view('livewire.project-tabs', compact('karyas'));
    }
}
