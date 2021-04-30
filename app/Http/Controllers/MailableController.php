<?php

namespace App\Http\Controllers;

use App\Mail\SendInformation;
use App\Models\ScholarshipRun;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use TCG\Voyager\Models\Role;

class MailableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Role::whereName('user')->first()->users()->get();
        return inertia('Mailer', ['applicants' => $applicants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'subject' => 'required|string',
                'message' => 'required|string|min:15'
            ]
        );

        $run = ScholarshipRun::whereIsActive(true)->first();

        foreach ($request->emails as $recipient) {
            $user = User::whereEmail($recipient)->first();
            Mail::to($recipient)->send(new SendInformation(
                $user,
                $run,
                $request->subject,
                $request->message,
                $request->hasActionButton,
                route('scholarship.edit', [$user->scholarship->version, $user])
            ));
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
