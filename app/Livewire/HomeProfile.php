<?php

namespace App\Livewire;

use Livewire\Component;

class HomeProfile extends Component
{
    public $show = false;

    public function toggle()
    {
        $this->show = !$this->show;
    }

    public function hide()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.home-profile');
    }
}
