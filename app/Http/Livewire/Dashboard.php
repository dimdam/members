<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Member;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Dashboard extends Component
{

    use LivewireAlert;


    public $phone_number = '';
    public $name = '';
    public $isOpen = false;
    // public Member $member;

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


    public function message()
    {
        $this->alert('error', 'Η αποστολή μηνυμάτων δεν ειναι πλέον διαθέσιμη. ', [
            'position' => 'center',
            'timer' => '',
            'toast' => false,
            'text' =>  ' Για να ενεργοποιηθεί ξανά θα πρέπει να υπάρχει:

            1) αριθμός χρεωστικής κάρτας
            2) κινητό τηλέφωνο υπευθύνου για την αποστολή μηνυμάτων' ,
            'showConfirmButton' => true,
            'onConfirmed' => '',
            'confirmButtonText' => 'Κλείσιμο',
            ]);
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
        $this->alert('success', 'Επιτυχής Εγγραφή!');
        $this->resetInputFields();
    }
    public function render()
    {
        $date = Carbon::now()->format('Y');
        $totalMembers = Member::count();
        $activeMembers = Member::where(function ($query) {
            $query->whereNotNull('membership_renewed_at')
                ->where('membership_renewed_at', '>=', Carbon::now()->subYears(3))
                ->orWhere(function ($subQuery) {
                    $subQuery->whereNull('membership_renewed_at')
                        ->where('updated_at', '>=', Carbon::now()->subYears(3));
                });
        })->count();
        $inactiveMembers = max(0, $totalMembers - $activeMembers);

        return view('livewire.dashboard', compact('date', 'totalMembers', 'activeMembers', 'inactiveMembers'));
    }
}
