@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
        <div class="row col-md-6 mt-2">
            <h3 class="mx-auto">KARTON MERILA <strong class="pl-5">{{ $kartoni->naziv }} {{ $kartoni->grupa }} {{ $kartoni->oznaka }} </strong></h3>
        </div>
        @if(!Auth::guest())
        <button class="btn btn-success text-white btn-lg mb-3" 
                type="button" 
                data-toggle="collapse" 
                data-target="#unosCollapse" 
                aria-expanded="false" 
                aria-controls="unosCollapse">
            Novi unos
          </button>
    </div>
    <div class="collapse" id="unosCollapse">
        <form action="/mernaOprema/karton/{{ $kartoni->id }}/popravka" method="POST" enctype="multipart/form-data">
            @csrf<!--Provera da li je user ulogovan-->  
    
            <div class="row">
                <div class="form-group col-md-4">
                    <label  for="datumPregleda">Datum pregleda
                    </label>
                    <input  id="datumPregleda" 
                        type="date" 
                        class="form-control @error('datumPregleda') is-invalid @enderror" 
                        name="datumPregleda" value="{{ old('datumPregleda') }}" 
                        autocomplete="off" autofocus
                        placeholder="Unesi datumPregleda...">
        
                    @error('datumPregleda')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label  for="vaziDo">Vazi do
                    </label>
                    <input  id="vaziDo" 
                        type="date" 
                        class="form-control @error('vaziDo') is-invalid @enderror" 
                        name="vaziDo" value="{{ old('vaziDo') }}" 
                        autocomplete="off" autofocus
                        placeholder="Unesi vaziDo...">
        
                    @error('vaziDo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label  for="brojZapisnika">Broj zapisnika
                    </label>
                    <input  id="brojZapisnika" 
                        type="text" 
                        class="form-control @error('brojZapisnika') is-invalid @enderror" 
                        name="brojZapisnika" value="{{ old('brojZapisnika') }}" 
                        autocomplete="off" autofocus
                        placeholder="Broj zapisnika...">
        
                    @error('brojZapisnika')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-4">
                    <label  for="odgovoran">Odgovoran</label>
                    
                        <select id="odgovoran"  
                                class="form-control @error('odgovoran') is-invalid @enderror" 
                                name="odgovoran" value="{{ old('odgovoran') }}"
                                autofocus>
                        <option value="" label="Odgovoran"></option>
                            @foreach ($users as $user)
                            <option value="{{ $user->name }} {{ $user->last_name }}">{{ $user->name }} {{ $user->last_name }}</option>
                            @endforeach
                        </select>
                        @error('odgovoran')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                </div>
                <div class="form-group col-md-4">
                    <label  for="datumPopravke">Datum popravke
                    </label>
                    <input  id="datumPopravke" 
                        type="date" 
                        class="form-control @error('datumPopravke') is-invalid @enderror" 
                        name="datumPopravke" value="{{ old('datumPopravke') }}" 
                        autocomplete="off" autofocus
                        placeholder="Unesi datumPopravke...">
        
                    @error('datumPopravke')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label  for="opisPopravke">Opis popravke
                    </label>
                    <input  id="opisPopravke" 
                        type="text" 
                        class="form-control @error('opisPopravke') is-invalid @enderror" 
                        name="opisPopravke" value="{{ old('opisPopravke') }}" 
                        autocomplete="off" autofocus
                        placeholder="Opis popravke...">
        
                    @error('opisPopravke')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            
            
            <button type="submit" class="btn btn-primary btn-block">UNESI POPRAVKU</button>
        </form>
    </div>
    @endif
    
            <table class="table">
                <tr>
                    <td colspan="4">
                        STRAUSS ADRIATIC - PR
                        <img src="{{ asset('img/image1.jpg') }}" class="img float-right">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <b>Karton merila</b>
                    </td>
                    <td colspan="2">
                        Obrazac broj: SG-SC-SA-PR-Ob.02.126-1
                    </td>
                </tr>
                <tr class="col-25">
                    <td>
                        <b>Strana 1 od 1</b>
                    </td>
                    <td style="border-right: 0px;">
                        Kopija br.
                    </td>
                    <td>
                        Važi od: 13.08.2009.
                    </td>
                    <td>
                    </td>
                </tr>
            </table>
            
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" colspan="5" class="text-center">Opsti podaci</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Naziv: <strong>{{ $kartoni->naziv }}</strong></td>
                        <td>Mesto ugradnje: <strong>{{ $kartoni->mestoUgradnje }}</strong></td>
                        <td>Oznaka merila: <strong>{{ $kartoni->grupa }} {{ $kartoni->oznaka }}</strong></td>
                        <td colspan="2">Broj masine/ Serijski broj: <strong>{{ $kartoni->serijskiBroj }}</strong></td>
                    </tr>
                    <tr>
                        <td>Proizvođač: <strong>{{ $kartoni->proizvodjac }}</strong></td>
                        <td colspan="2">Tip: <strong>{{ $kartoni->tip }}</strong></td>
                        <td>Godina proizvodnje: <strong>{{ $kartoni->godinaProizvodnje }}</strong></td>
                        <td>Datum nabavke: <strong>{{ $kartoni->datumNabavke }}</strong></td>
                    </tr>
                    <tr>
                        <td>Merni opseg: <strong>{{ $kartoni->merniOpseg }}</strong></td>
                        <td colspan="2">Klasa tacnosti: <strong>{{ $kartoni->klasaTacnosti }}</strong></td>
                        <td colspan="2">Klasifikacioni broj: <strong>{{ $kartoni->klasifikacioniBroj }}</strong></td>
                    </tr>
                    <tr>
                        <td>Prateca dokumenta: <strong>{{ $kartoni->pratecaDokumentacija }}</strong></td>
                        <td colspan="2">Prateca oprema: <strong>{{ $kartoni->pratecaOprema }}</strong></td>
                        <td colspan="2">NAPOMENA: <strong>{{ $kartoni->napomena }}</strong></td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-hover table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th style="width:55%" scope="col" colspan="5" class="text-center">PREGLEDI</th>
                        <th style="width:45%" scope="col" colspan="5" class="text-center">POPRAVKE</th>
                    </tr>
                </thead>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">R.br</th>
                        <th scope="col">Datum pregleda</th>
                        <th scope="col">Vazi do</th>
                        <th scope="col">Broj zapisnika</th>
                        <th scope="col">Potpis</th>
                        <th scope="col">Datum</th>
                        <th scope="col">Opis popravke</th>
                    </tr>
                </thead>
                
               
                <tbody>
                    @foreach ($spisakPopravki as $popravka)
                        <tr style="height: 70px">
                            <th scope="row"> {{ $popravka->id }}</th>
                            <td>{{ $popravka->datumPregleda }}</td>
                            <td>{{ $popravka->vaziDo }}</td>
                            <td>{{ $popravka->brojZapisnika }}</td>
                            <td>{{ $popravka->odgovoran }}</td>
                            <td>{{ $popravka->datumPregleda }}</td>
                            <td>{{ $popravka->opisPopravke }}</td>
                        </tr>
                    @endforeach
                    @for ($i = $spisakPopravki->count(); $i < 10; $i++)
                    <tr style="height: 70px">
                        <th scope="row"> {{ $i+1 }}</th>     
                        <td>&nbsp</th>                   
                        <td>&nbsp</th>                   
                        <td>&nbsp</th>                   
                        <td>&nbsp</th>                   
                        <td>&nbsp</th>                   
                        <td>&nbsp</th>
                    </tr>
                    @endfor
                        
                </tbody>  
            </table>
            <div class="row ml-3">{{ $spisakPopravki->links() }}</div> 

            <table class="table tableOdobrenje">
                <thead>
                    <tr>
                        <th colspan="2">
                            Izradio: Masic Nemanja, Menadzer odrzavanja
                        </th>
                        <th colspan="2">
                            Odobrio: Zivkovic Milan, Tehnicki direktor
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Potpis:
                        </th>
                        <th>
                            Datum: 15.06.2009.
                        </th>
                        <th>
                            Potpis:
                        </th>
                        <th>
                            Datum: 12.08.2009.
                        </th>
                    </tr>
                </thead>
            </table>
</div>



@endsection
