<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScholarshipRequest;
use App\Models\User;
use App\Models\Scholarship;
use Illuminate\Support\Facades\Auth;

class ScholarshipController extends Controller
{
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
    public function index()
    {
        return inertia("Student/IndexPage");
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
     * @param  \App\Models\Scholarship  $scholarship
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Scholarship $scholarship, User $user)
    {
        return inertia("Student/ShowPage");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Scholarship $scholarship, User $user)
    {
        return inertia("Student/EditPage");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ScholarshipRequest  $request
     * @param  \App\Models\Scholarship  $scholarship
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ScholarshipRequest $request, Scholarship $scholarship, User $user)
    {
        $scholarship = $user->scholarships
            ->where("version", setting('site.scholarship_version'))
            ->first();

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
            // 'passport_photograph_url' => $request->otherNames,
            // 'course_of_study' => $request->otherNames,
            // 'year_of_admission' => $request->otherNames,
            // 'course_duration' => $request->otherNames,
            // 'current_level' => $request->otherNames,
            // 'year_of_graduation' => $request->otherNames,
        ]);
        // dd($request->all());
        return redirect()->back();
    }

    /**
     * Soft-delete the specified resource.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function delete(Scholarship $scholarship, User $user)
    {
        dd($scholarship);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scholarship $scholarship, User $user)
    {
        dd($scholarship);
        return redirect()->back();
    }
}
