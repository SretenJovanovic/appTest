<?php

namespace App\Http\Controllers;

use App\MernaOpremaSpisak;
use App\KartonMerila;
use App\KartonMerilaUnos;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KartonMerilasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $spisakMerila = DB::table('merna_oprema_spisaks')->get();
        $kartonMerila = DB::table('karton_merilas')->paginate(10);
        return view('mernaOprema.kartonSpisak', ['kartonMerila' => $kartonMerila]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $merilo)
    {
        $spisakMerila = DB::table('merna_oprema_spisaks')->find($merilo);
       
        return view('mernaOprema.karton', ['spisakMerila' => $spisakMerila]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {   
    //     $data = request()->validate([
    //         'naziv' => 'required',
    //         'mestoUgradnje' => 'required',
    //         'grupa' => 'nullable',
    //         'oznaka' => 'nullable',
    //         'serijskiBroj' => 'required',
    //         'proizvodjac' => 'nullable',
    //         'tip' => 'required',
    //         'godinaProizvodnje' => 'required',
    //         'datumNabavke' => 'required',
    //         'merniOpseg' => 'required',
    //         'klasaTacnosti' => 'required',
    //         'klasifikacioniBroj' => 'nullable',
    //         'pratecaDokumentacija' => 'nullable',
    //         'pratecaOprema' => 'nullable',
    //         'napomena' => 'nullable',
    //     ]); 
    //         kartonMerila()->create([
    //         'naziv' => $data['naziv'],
    //         'mestoUgradnje' => $data['mestoUgradnje'],
    //         'grupa' => $data['grupa'],
    //         'oznaka' => $data['oznaka'],
    //         'serijskiBroj' => $data['serijskiBroj'],
    //         'proizvodjac' => $data['proizvodjac'],
    //         'tip' => $data['tip'],
    //         'godinaProizvodnje' => $data['godinaProizvodnje'],
    //         'datumNabavke' => $data['datumNabavke'],
    //         'merniOpseg' => $data['merniOpseg'],
    //         'klasaTacnosti' => $data['klasaTacnosti'],
    //         'klasifikacioniBroj' => $data['klasifikacioniBroj'],
    //         'pratecaDokumentacija' => $data['pratecaDokumentacija'],
    //         'pratecaOprema' => $data['pratecaOprema'],
    //         'napomena' => $data['napomena'],
    //         ]);

    //     return redirect('/mernaOprema/index/');

    // }
    public function store(Request $request, $merilo) //the Id from the route
    {
        $this->validate($request,[
            'naziv' => 'required',
            'mestoUgradnje' => 'required',
            'grupa' => 'required',
            'oznaka' => 'required',
            'serijskiBroj' => 'required',
            'proizvodjac' => 'required',
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
    
        $karton = new kartonMerila();
        $karton->naziv = $request->input("naziv");
        $karton->mestoUgradnje = $request->input("mestoUgradnje");
        $karton->grupa = $request->input("grupa");
        $karton->oznaka = $request->input("oznaka");
        $karton->serijskiBroj = $request->input("serijskiBroj");
        $karton->proizvodjac = $request->input("proizvodjac");
        $karton->tip = $request->input("tip");
        $karton->godinaProizvodnje = $request->input("godinaProizvodnje");
        $karton->datumNabavke = $request->input("datumNabavke");
        $karton->merniOpseg = $request->input("merniOpseg");
        $karton->klasaTacnosti = $request->input("klasaTacnosti");
        $karton->klasifikacioniBroj = $request->input("klasifikacioniBroj");
        $karton->pratecaDokumentacija = $request->input("pratecaDokumentacija");
        $karton->pratecaOprema = $request->input("pratecaOprema");
        $karton->napomena = $request->input("napomena");
        $karton->merna_oprema_spisak_id = $merilo; //The id from the route
        $karton->save();

        return redirect('mernaOprema/spisak');
    }

    public function popravkaStore(Request $request, $kartonId) //the Id from the route
    {
        $this->validate($request,[
            'datumPregleda' => 'nullable',
            'vaziDo' => 'nullable',
            'brojZapisnika' => 'nullable',
            'odgovoran' => 'required',
            'datumPopravke' => 'nullable',
            'opisPopravke' => 'nullable',
        ]);

        $kartonUnos = new kartonMerilaUnos();
        $kartonUnos->datumPregleda = $request->input("datumPregleda");
        $kartonUnos->vaziDo = $request->input("vaziDo");
        $kartonUnos->brojZapisnika = $request->input("brojZapisnika");
        $kartonUnos->odgovoran = $request->input("odgovoran");
        $kartonUnos->datumPopravke = $request->input("datumPopravke");
        $kartonUnos->opisPopravke = $request->input("opisPopravke");
        $kartonUnos->karton_merila_id = $kartonId; //The id from the route
        $kartonUnos->save();

        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($karton)
    {
        $kartoni = DB::table('karton_merilas')->find($karton);
        $spisakPopravki =  DB::table('karton_merila_unos')->where('karton_merila_id',$karton)->orderBy('datumPopravke','DESC')->paginate(10);
        

        $users = DB::table('users')->get();

        return view('mernaOprema.kartonShow', ['kartoni' => $kartoni,
                                        'spisakPopravki' => $spisakPopravki,
                                        'users' => $users]);
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
