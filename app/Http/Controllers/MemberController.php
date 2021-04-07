<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nexmo\Laravel\Facade\Nexmo;
use Vonage\Message\Unicode;
use Livewire\Component;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('members.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }

    public function print()
    {
        $date = Carbon::now()->format('Y');

        $members = Member::where(['is_a_candidate' => true])
            ->orWhere(['is_a_scrutineer_candidate' => true])->get();

        return view('print', compact('members', 'date'));
    }


    public function sms()
    {
        return view('sms');
    }

    public function sendSMS(Request $request)
    {


        $body_array = $this->validate($request, ['body' => 'required']);
        $body_imploded = implode(" ", $body_array);

        function uc_without_accents($body_imploded, $enc = "utf-8")
        {
            return strtr(
                mb_strtoupper($body_imploded, $enc),
                array(
                    'Ά' => 'Α', 'Έ' => 'Ε', 'Ί' => 'Ι', 'Ή' => 'Η', 'Ύ' => 'Υ',
                    'Ό' => 'Ο', 'Ώ' => 'Ω', 'A' => 'A', 'A' => 'A', 'A' => 'A', 'A' => 'A',
                    'Y' => 'Y', 'ΐ' => 'Ϊ'
                )
            );
        }

        $body = uc_without_accents($body_imploded);
        // dd($body);
        $members = DB::table('members')
            ->where(['paid_membership' => true])
            ->whereNotNull('phone_number')->get();

        // dd($members);

        foreach ($members as $member) {
            Nexmo::message()->send([
                'to'   => $member->phone_number,
                'from' => 'SYLLOGOS',
                'text' => $body,
                'type' => 'unicode'
            ]);
        }

        return redirect()->route('dashboard')
            ->with(Toastr::success('Το μήνυμα εστάλη!'));
    }
}
