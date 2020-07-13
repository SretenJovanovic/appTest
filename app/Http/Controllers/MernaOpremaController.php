<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MernaOpremaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spisakMerila = DB::table('merna_oprema_spisaks')->paginate(10);
        $kartonMerilaId = DB::table('karton_merilas')->get();
        $users = DB::table('users')->get();

        return view('mernaOprema.index', ['spisakMerila' => $spisakMerila, 'kartonMerilaId' => $kartonMerilaId, 'users' => $users ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mernaOprema.create');
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
            'proizvodjac' => 'required',
            'grupa' => 'required',
            'oznaka' => 'required|numeric',
            'odgovoran' => 'required',
            'uputstvo' => 'nullable',
        ]);

        auth()->user()->mernaOpremaSpisak()->create([
            'naziv' => $data['naziv'],
            'proizvodjac' => $data['proizvodjac'],
            'grupa' => $data['grupa'],
            'oznaka' => $data['oznaka'],
            'odgovoran' => $data['odgovoran'],
            'uputstvo' => $data['uputstvo'],
        ]);
        return redirect('/mernaOprema/spisak');

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
