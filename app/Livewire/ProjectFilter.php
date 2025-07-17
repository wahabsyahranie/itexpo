<?php

namespace App\Livewire;

use App\Models\XpKarya;
use Livewire\Component;
use App\Models\XpKategori;

class ProjectFilter extends Component
{
    public $selectedCategory = null;

    public function setCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
    }

    public function render()
    {
        $categories = XpKategori::all();

        $recentCreations = XpKarya::with('xpKategori')
            ->where('dipublikasi', 1)
            ->when($this->selectedCategory, function ($query) {
                $query->where('xp_kategori_id', $this->selectedCategory);
            })
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();

        return view('livewire.project-filter', compact('categories', 'recentCreations'));
    }
}
