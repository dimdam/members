<?php

namespace App\Http\Livewire;
// use App\Models\Member;

use App\Models\Member as ModelsMember;
use Livewire\Component;

class Member extends Component
{

    public  $phone_number = '';
    public $name = '';
    public $isOpen = 0;
    public Member $member;
    public $paid_membership;

    protected $rules = [
        'name' => 'required',
        'phone_number' => 'required | numeric | digits:10 | starts_with: 6,7,8,9'
    ];

    public function render()
    {
        return view('livewire.member');
    }

    public function mount(Member $member)
    {
        $this->name = $member->name;

        $this->phone_number = $member->phone_number;
        $this->paid_membership = $member->paid_membership;
    }

    public function create()

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
        $validatedData = ['paid_membership' => true];

        $validatedData = $this->validate();

        ModelsMember::create($validatedData);
        //    dd($valitadedData);

        $this->closeModal();

        $this->dispatchBrowserEvent('alert',

        ['type' => 'success',  'message' => 'Επιτυχής Εγγραφή!']);
        $this->resetInputFields();

    }
}
