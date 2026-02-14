<?php

namespace App\Http\Livewire;

use App\Models\Member as ModelsMember;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Member extends Component
{
    use LivewireAlert;

    public $phone_number = '';
    public $name = '';
    public $paid_membership = true;

    protected $rules = [
        'name' => 'required',
        'phone_number' => 'nullable|digits:10|starts_with:6'
    ];

    public function render()
    {
        return view('livewire.member');
    }

    public function mount(?ModelsMember $member = null)
    {
        if (!$member) {
            return;
        }

        $this->name = $member->name;
        $this->phone_number = $member->phone_number;
        $this->paid_membership = $member->paid_membership ?? true;
    }

    private function resetInputFields()
    {

        $this->name = '';

        $this->phone_number = '';
    }
    public function save()
    {
        $validatedData = $this->validate();
        $validatedData['paid_membership'] = true;
        $validatedData['membership_renewed_at'] = now()->subYear()->endOfYear();

        ModelsMember::create($validatedData);

        $this->alert('success', 'Επιτυχής Εγγραφή!');
        $this->resetInputFields();

    }
}
