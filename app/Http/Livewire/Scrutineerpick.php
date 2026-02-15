<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Member;
use Livewire\WithPagination;
use Carbon\Carbon;

class Scrutineerpick extends Component
{
    use WithPagination;

    public $search = '';
    public $updateMode = false;
    public $sortField;
    public $is_a_scrutineer_candidate;
    public $is_a_candidate;
    public $sortAsc = true;
    public $confirmation;
    protected $queryString = [
        'search',
        'sortAsc',
        'sortField'
    ];
    public $multi = [];

    public function confirmUpdate($id)
    {
        $this->confirmation = $id;
    }


    public function viewSelection()

    {

        $array_of_ids = collect($this->multi);

        Member::query()
            ->whereIn('id', $array_of_ids->filter(fn ($member) => $member)->keys()->toArray())
            ->update([
                'is_a_scrutineer_candidate' => true,
                'is_a_candidate' => false
            ]);

        // Member::upsert([
        //     [$array_of_ids, $this->is_a_scrutineer_candidate => 'is_a_scrutineer_candidate']
        // ]);

        //    Member::whereIn('id', $array)


        //     ->update(array('is_a_scrutineer_candidate' => true));




        // $member =  Member::where('id', $this->multi);

        // $member->update([

        // 'updated_at' => Carbon::now(),

        // 'is_a_scrutineer_candidate' => true

        // ]);

        // $this->resetInputFields();
        // $this->updateMode = false;
        redirect('/elections-second-step');
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

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {



        return view('livewire.scrutineer', [
            'members' => Member::where('name', 'like', '%' . $this->search . '%')
                ->where('paid_membership', true)
                ->where('membership_renewed_at', '>=', Carbon::now()->subYears(3))
                ->when($this->sortField, function ($query) {
                    $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                })->paginate(10),
        ]);
    }
}
