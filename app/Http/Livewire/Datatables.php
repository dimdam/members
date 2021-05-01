<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Datatables extends Component
{

    use WithPagination;
    public $updateMode = false;
    public $member_id;
    public $member;
    public $paid_membership = true;
    public $updated_at;
    public $search = '';
    public $sortField;
    public $successMessage;
    public $sortAsc = true;
    public $confirmation;
    protected $queryString = [
        'search',
        'paid_membership',
        'sortAsc',
        'sortField'
    ];

    private function resetInputFields()
    {

        $this->name = '';

        // $this->email = '';

    }



    // protected $rules = [

    //     'paid_membership' => 'boolean'
    // ];

    public function mount(Member $member)
    {
        $this->updated_at = $member->updated_at;
    }

    public function confirmUpdate($id)
    {
        $this->confirmation = $id;
    }


    public function update($id)

    {


        if ($id) {

            $member =  Member::where('id', $id);

            $member->update([

                'updated_at' => Carbon::now(),

                'paid_membership' => true

            ]);


            $this->updateMode = false;
        }

        $this->dispatchBrowserEvent('alert',

         ['type' => 'success',  'message' => 'Επιτυχής Ανανέωση Συνδρομής!']);



        $this->resetInputFields();
    }





    public function updatingSearch()
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
            'members' => Member::where('name', 'like', '%' . $this->search . '%')
                ->where('paid_membership', $this->paid_membership)
                ->when($this->sortField, function ($query) {
                    $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                })->paginate(5),
        ])->with(compact('now'));
    }
}
