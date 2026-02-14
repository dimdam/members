<?php

namespace App\Http\Livewire;


use App\Models\Member;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Datatables extends Component
{

    use WithPagination;
    use LivewireAlert;
    public $isOpen = false;
    public $updateMode = false;
    public $member_id;
    public  $phone_number;
    public $name;
    public $member;
    public $paid_membership = true;
    public $updated_at;
    public $search = '';
    public $sortField;
    public $successMessage;
    public $sortAsc = true;
    public $confirmation;
    public $perPage = 10;
    protected $queryString = [
        'search',
        'paid_membership',
        'sortAsc',
        'sortField',
        'updated_at',
        'perPage'

    ];

    private function resetInputFields()
    {

        $this->name = '';

        // $this->email = '';

    }



    // protected $rules = [

    //     'paid_membership' => 'boolean'

    // ];

    public function openModal()

    {

        $this->isOpen = true;
    }

    public function closeModal()

    {

        $this->isOpen = false;
    }

    public function mount(Member $member)
    {
        $this->updated_at = $member->updated_at;
    }

    public function editMember($id)

    {
        $this->updateMode = true;
        $member = Member::where('id', $id)->first();
        $this->member_id = $id;
        $this->name = $member->name;
        $this->phone_number = $member->getOriginal('phone_number');

        //  $member =  Member::where('id', $member->id);

        // $this->resetInputFields();

        $this->openModal();

        //  $this->state = $member->toArray();

        //    dd($member);

    }

    public function confirmUpdate($id)
    {
        $this->confirmation = $id;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function cancelRenewal()
    {
        $this->confirmation = null;
        $this->dispatch('$refresh');
    }


    public function update_member_details()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'phone_number' => 'regex:/(6)[0-9]{9}/',
        ]);
        if ($this->member_id) {
            $member = Member::where('id', $this->member_id)->first();
            //  dd($member);
            $member->update([
                'name' => $this->name,
                'phone_number' => $this->phone_number,
            ]);
            $this->updateMode = false;



            $member->save();

        $this->alert('success', 'Επιτυχής Αλλαγή Στοιχείων!');
            // $this->resetInputFields();
            $this->closeModal();
            // return view('livewire.datatables');
        }
    }


    public function update_subscription($id)

    {
        if (!$id) {
            $this->alert('error', 'Δεν βρέθηκε μέλος για ανανέωση.');
            return;
        }

        $member = Member::find($id);
        if (!$member) {
            $this->alert('error', 'Δεν βρέθηκε μέλος για ανανέωση.');
            return;
        }

        $member->update([
            'membership_renewed_at' => Carbon::now()->subYear()->endOfYear(),
            'paid_membership' => true
        ]);

        $this->updateMode = false;
        $this->resetInputFields();
        $this->confirmation = null;
        $this->dispatch('$refresh');
        $this->alert('success', 'Επιτυχής Ανανέωση Συνδρομής!');
    }





    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingPerPage()
    {
        $this->resetPage();
    }





    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function render()
    {

        $now = Carbon::now()->year;

        return view('livewire.datatables', [
            'members' => Member::where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('phone_number', 'like', '%' . $this->search . '%');
            })
                //  ->where('paid_membership', $this->paid_membership)
                //   ->whereYear('updated_at',  $now)
                // ->with('updated_at', $this->updated_at)

                ->when($this->sortField, function ($query) {
                    $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                })->paginate($this->perPage),
        ])->with(compact('now'));
    }


}
