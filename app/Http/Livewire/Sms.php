<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Sms extends Component
{

    public $isOpen = false;




    public function openModal()

    {

        $this->isOpen = true;
    }
    public function closeModal()

    {

        $this->isOpen = false;
    }

    private function resetInputFields()
    {

        $this->name = '';

        $this->phone_number = '';
    }


    public function render()
    {
        return view('livewire.sms');
    }
}
