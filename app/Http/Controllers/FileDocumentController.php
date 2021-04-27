<?php

namespace App\Http\Controllers;

use App\Models\FileDocument;
use Illuminate\Http\Request;

class FileDocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileDocument  $fileDocument
     * @return \Illuminate\Http\Response
     */
    public function show(FileDocument $fileDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileDocument  $fileDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(FileDocument $fileDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FileDocument  $fileDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileDocument $fileDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileDocument  $fileDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy($fileDocument = null)
    {
        dd($fileDocument);
        redirect()->back();
    }
}
