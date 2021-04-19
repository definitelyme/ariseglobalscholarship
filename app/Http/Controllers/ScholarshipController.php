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
        // $file = $request->input('files')[0];
        // dd(base64_encode(file_get_contents($file['url'])));
        // dump($request->files);
        dd($request->all());
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
