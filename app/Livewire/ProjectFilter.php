<?php

namespace App\Livewire;

use App\Models\XpKarya;
use Livewire\Component;
use App\Models\XpKategori;
use Livewire\WithPagination;

class ProjectFilter extends Component
{
    public $selectedCategory = null;
    public $selectedPagination = null;

    public function setCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
    }

    public function setPagination($paginationNumber)
    {
        $this->selectedPagination = $paginationNumber;
    }

    use WithPagination;

    public function render()
    {
        $categories = XpKategori::all();

        $recentCreations = XpKarya::with('xpKategori')
            ->where('dipublikasi', 1)
            ->when($this->selectedCategory, function ($query) {
                $query->where('xp_kategori_id', $this->selectedCategory);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('livewire.project-filter', compact('categories', 'recentCreations'));
    }
}
