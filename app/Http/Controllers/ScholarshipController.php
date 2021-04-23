<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\UploadTraits;
use App\Http\Requests\ScholarshipRequest;
use App\Models\User;
use App\Models\ScholarshipRun;
use Illuminate\Support\Facades\Auth;

class ScholarshipController extends Controller
{
    use UploadTraits;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('applicant');
        $this->middleware('verified');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return inertia("Student/AboutPage");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ScholarshipRun $program = null)
    {
        $user = User::whereId(Auth::user()->id)->first();

        $scholarships = null;
        $scholarship = null;

        if ($program == null) $scholarships = $user->scholarships;
        else $scholarship = $user->scholarship->with('run:version_id,is_active')->first();

        return inertia('Dashboard', [
            'scholarships' => $scholarships,
            'scholarship' => $scholarship,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia("Student/CreatePage");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ScholarshipRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScholarshipRequest $request)
    {
        dd($request->other);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScholarshipRun  $scholarship
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(ScholarshipRun $program, User $user)
    {
        return inertia("Student/ShowPage");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScholarshipRun  $scholarship
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(ScholarshipRun $program, User $user)
    {
        return inertia("Student/CreatePage");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ScholarshipRequest  $request
     * @param  \App\Models\ScholarshipRun  $scholarship
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ScholarshipRequest $request, ScholarshipRun $program, User $user)
    {
        // Update user's name if first_name and last_name is defined
        // Else use original user's name
        if (!empty($request->firstName) || !empty($request->lastName))
            $user->update([
                'name' => "{$request->firstName} {$request->lastName}"
            ]);

        $scholarship = $user->scholarship;

        // Update scholarship information
        $scholarship->update([
            'other_names' => $request->otherNames ?? $scholarship->other_names,
            'phone' => $request->phone ?? $scholarship->phone,
            'dob' => $request->dob ?? $scholarship->dob,
            'age' => $request->age ?? $scholarship->age,
            'gender' => $request->gender ?? $scholarship->gender,
            'marital_status' => $request->maritalStatus ?? $scholarship->marital_status,
            'address_street' => $request->address ?? $scholarship->address_street,
            'address_country' => $request->country ?? $scholarship->address_country,
            'address_state' => $request->state ?? $scholarship->address_state,
            'address_lga' => $request->localGovtArea ?? $scholarship->address_lga,
            'address_city' => $request->city ?? $scholarship->address_city,
            'origin_country' => $request->countryOrigin ?? $scholarship->origin_country,
            'origin_state' => $request->stateOfOrigin ?? $scholarship->origin_state,
            'origin_lga' => $request->lgaOfOrigin ?? $scholarship->origin_lga,
            'origin_hometown' => $request->hometown ?? $scholarship->origin_hometown,
            'kin_name' => $request->kinName ?? $scholarship->kin_name,
            'kin_phone' => $request->kinPhone ?? $scholarship->kin_phone,
            'kin_relationship' => $request->kinRelationship ?? $scholarship->kin_relationship,
            'is_on_scholarship' => $request->hasBursary ?? $scholarship->is_on_scholarship,
            'course_of_study' => $request->courseOfStudy ?? $scholarship->course_of_study,
            'year_of_admission' => $request->yearOfAdmission ?? $scholarship->year_of_admission,
            'course_duration' => $request->courseDuration ?? $scholarship->course_duration,
            'current_level' => $request->currentLevel ?? $scholarship->current_level,
            'year_of_graduation' => $request->expectedYearOfGraduation ?? $scholarship->year_of_graduation,
        ]);

        if ($request->hasFile('passport')) $this->uploadPassport($request->passport, $user);

        if ($request->hasFile('documents')) $this->uploadDocuments($user, $scholarship, ...$request->documents);

        // Reload user and associate relationships
        $user->refresh();

        return redirect()->back();
    }

    /**
     * Soft-delete the specified resource.
     *
     * @param  \App\Models\ScholarshipRun  $scholarship
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function delete(ScholarshipRun $program, User $user)
    {
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScholarshipRun  $scholarship
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScholarshipRun $program, User $user)
    {
        return redirect()->back();
    }
}
