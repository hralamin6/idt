<?php

namespace App\Http\Controllers;

use App\Models\Atom;
use App\Http\Requests\StoreAtomRequest;
use App\Http\Requests\UpdateAtomRequest;

class AtomController extends Controller
{
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
     * @param  \App\Http\Requests\StoreAtomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAtomRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atom  $atom
     * @return \Illuminate\Http\Response
     */
    public function show(Atom $atom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atom  $atom
     * @return \Illuminate\Http\Response
     */
    public function edit(Atom $atom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAtomRequest  $request
     * @param  \App\Models\Atom  $atom
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAtomRequest $request, Atom $atom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atom  $atom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atom $atom)
    {
        //
    }
}
