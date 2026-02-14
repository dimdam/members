<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $now = Carbon::now();
        $max_subscription_date = Carbon::now()->subYears(3);
        $date = array($max_subscription_date, $now);

        $members = DB::table('members') //active memebrs etc..
            ->whereBetween('updated_at', $date)
            ->whereNotNull('phone_number')->get();

        $count_members = count($members) * 0.098;

        //   dd($count_members);
        return view('sms')->with('success', compact('count_members'));
    }

    public function sendSMS(Request $request)
    {
        return redirect()->route('dashboard')
            ->with('status', 'Η αποστολή SMS είναι προσωρινά απενεργοποιημένη.');
    }
}
