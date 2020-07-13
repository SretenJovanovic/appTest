<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MernaOpremaKartonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(User $user)
    {
        return view('mernaOprema.karton', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mernaOprema.karton.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    public function store()
    {   
        $data = request()->validate([
            'naziv' => 'required',
            'mestoUgradnje' => 'required',
            'grupa' => 'nullable',
            'oznaka' => 'nullable',
            'serijskiBroj' => 'required',
            'proizvodjac' => 'nullable',
            'tip' => 'required',
            'godinaProizvodnje' => 'required',
            'datumNabavke' => 'required',
            'merniOpseg' => 'required',
            'klasaTacnosti' => 'required',
            'klasifikacioniBroj' => 'nullable',
            'pratecaDokumentacija' => 'nullable',
            'pratecaOprema' => 'nullable',
            'napomena' => 'nullable',
        ]);
           
            spisak()->create([
            'naziv' => $data['naziv'],
            'mestoUgradnje' => $data['mestoUgradnje'],
            'grupa' => $data['grupa'],
            'oznaka' => $data['oznaka'],
            'serijskiBroj' => $data['serijskiBroj'],
            'proizvodjac' => $data['proizvodjac'],
            'tip' => $data['tip'],
            'godinaProizvodnje' => $data['godinaProizvodnje'],
            'datumNabavke' => $data['datumNabavke'],
            'merniOpseg' => $data['merniOpseg'],
            'klasaTacnosti' => $data['klasaTacnosti'],
            'klasifikacioniBroj' => $data['klasifikacioniBroj'],
            'pratecaDokumentacija' => $data['pratecaDokumentacija'],
            'pratecaOprema' => $data['pratecaOprema'],
            'napomena' => $data['napomena'],
        ]);
        return redirect('/mernaOprema/karton/' .auth()->user()->id);

    }
    // public function store(Request $request)
    // {
    //     //
    // }

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
