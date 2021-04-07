<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Member;


class Dashboard extends Component
{
    public  $phone_number;
    public $name;
    public $isOpen = false;
// public Member $member;

    public function mount(Member $member)
    {
        $this->name = $member->name;

        $this->phone_number = $member->phone_number;
    }
    protected $rules = [
        'name' => 'required',
        'phone_number' => 'regex:/(6)[0-9]{9}/'
    ];

    public function createMember()

    {

        $this->resetInputFields();

        $this->openModal();
    }

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
    public function save()
    {

       $validatedData = $this->validate();
       Member::create($validatedData);

        $this->closeModal();
        $this->dispatchBrowserEvent('alert',

        ['type' => 'success',  'message' => 'Επιτυχής Εγγραφή!']);
        $this->resetInputFields();
    }
    public function render()
    {
        $date = Carbon::now()->format('Y');
        return view('livewire.dashboard', compact('date'));
    }
}
