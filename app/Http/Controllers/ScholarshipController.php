<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\UploadTraits;
use App\Http\Requests\ScholarshipRequest;
use App\Models\Scholarship;
use App\Models\User;
use App\Models\ScholarshipRun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScholarshipController extends Controller
{
    use UploadTraits;

    /**
     * The Currently authenticated User
     */
    private User $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('applicant');
        $this->middleware('verified');
        $this->middleware(function ($request, $next) {
            $this->user = User::whereId(auth()->user()->id)->first();
            return $next($request);
        });
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
        // $user = User::whereId(Auth::user()->id)->first();

        $scholarships = null;
        $scholarship = null;

        try {
            if ($program == null) $scholarships = $this->user->scholarships;
            // If the "else" block throws an exception, it means
            // the user has not applied for the currently active scholarship
            else $scholarship = $this->user->scholarship;
        } catch (\Throwable $th) {
            // If scholarship is closed
            if ($program->isClosed()) return inertia('ScholarshipClosed');
            // If scholarship is open & user has not applied for scholarship
            else if (!$program->isClosed() && !$this->user->hasAppliedForProgram($program))
                return redirect()->route('dashboard', ['program' => $program]);
        }

        $program = ScholarshipRun::whereIsActive(true)->first();

        if ($program != null)
            $userAlreadyApplied = $this->user->hasAppliedForProgram($program);
        else $userAlreadyApplied = false;

        return inertia('Dashboard', [
            'scholarships' => $scholarships,
            'unapplied' => !$userAlreadyApplied ? $program : null,
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
        // Check if the user has an active scholarship
        $hasActiveScholarship = $this->user->scholarship != null;
        // Navigate to another page if false
        if (!$hasActiveScholarship) return inertia('ScholarshipClosed');
        // Navigate to Application page
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
        // Create new scholarship
        $scholarship = new Scholarship;
        // Associate scholarship with user
        $association = $scholarship->user()->associate($this->user);

        $program = ScholarshipRun::find($request->program['id']);
        // Save associated scholarship run (program)
        $program->scholarships()->save($association);
        // Refresh user
        $this->user->refresh();

        return redirect()->back();
    }

    /**
     * Display the specified resource.user
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
        // Scholarship is closed & user has applied
        if ($program->isClosed() && $user->hasAppliedForProgram($program))
            return inertia('ScholarshipClosed');
        // If scholarship is open & user has not applied for scholarship
        else if (!$program->isClosed() && !$user->hasAppliedForProgram($program))
            return redirect()->route('dashboard', ['program' => $program]);
        // if scholarship is closed and user has not applied for scholarship
        else if ($program->isClosed() && !$user->hasAppliedForProgram($program))
            return inertia('ScholarshipClosed');
        // Else scholarship is open & user has applied
        return inertia("Student/CreatePage");
    }

    /**
     * Show the form for reapplying to another scholaship
     *
     * @param  \App\Models\ScholarshipRun  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function reapply(ScholarshipRun $program)
    {
        dd(null);
        return redirect()->route('dashboard');
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
