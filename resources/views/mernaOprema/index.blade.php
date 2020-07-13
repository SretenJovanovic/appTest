@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="row col-md-6 mt-2">
                <h3 class="mx-auto">SPISAK MERNE OPREME</h3>
            </div>
            
            <!-- Button trigger modal -->
            @if(!Auth::guest())
                <button type="button" class="btn btn-primary btn-lg mb-3" data-toggle="modal" data-target="#exampleModal">
                    Dodaj novo merilo u spisak opreme
                </button>
            @endif
        </div>
            <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg col-md-8 mx-auto text-white pt-2 pb-3 mb-3" role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h3 class="modal-title col-md-6 mx-auto" id="exampleModalLabel">DODAJ NOVO MERILO</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="text-white" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <!--FORMA-->
                        <form action="/mernaOprema" method="POST" enctype="multipart/form-data">
                            @csrf<!--Provera da li je user ulogovan-->  
                            <div class="form-group">
                                <label  for="naziv">Naziv merne opreme
                                </label>
                                <input  id="naziv" 
                                    type="text" 
                                    class="form-control @error('naziv') is-invalid @enderror" 
                                    name="naziv" value="{{ old('naziv') }}" 
                                    autocomplete="off" autofocus
                                    placeholder="Unesi naziv...">
    
                                @error('naziv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label  for="proizvodjac">Proizvodjac merne opreme
                                </label>
                                <input  id="proizvodjac" 
                                    type="text" 
                                    class="form-control @error('proizvodjac') is-invalid @enderror" 
                                    name="proizvodjac" value="{{ old('proizvodjac') }}" 
                                    autocomplete="off" autofocus
                                    placeholder="Unesi proizvodjaca...">
    
                                @error('proizvodjac')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label  for="grupa" >Grupa merila</label>

                                    <select id="grupa"  
                                            class="form-control @error('grupa') is-invalid @enderror" 
                                            name="grupa" value="{{ old('grupa') }}"
                                            autofocus>
                                        <option value="" label="Odaberi grupu"></option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                        @error('grupa')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror

                                    <label class="mt-2" for="oznaka">Redni broj</label>
                                    <input  id="oznaka" 
                                        type="number" 
                                        min="0"
                                        class="form-control @error('oznaka') is-invalid @enderror" 
                                        name="oznaka" value="{{ old('oznaka') }}" 
                                        autocomplete="off"
                                        placeholder="Unesi oznaku...">
        
                                    @error('oznaka')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-8 bg-default pt-2">
                                    <p>I - Radni etaloni </p>
                                    <p>II - Merila koja se koriste u prometu</p>
                                    <p>III - Merila koja se koriste u proizvodnom procesu</p>
                                    <p>IV - Indikatori</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label  for="odgovoran">Odgovoran</label>
                                
                                    <select id="odgovoran"  
                                            class="form-control @error('odgovoran') is-invalid @enderror" 
                                            name="odgovoran" value="{{ old('odgovoran') }}"
                                            autofocus>
                                    <option value="" label="Odgovoran"></option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->name }} {{ $user->last_name }}">
                                            {{ $user->name }} {{ $user->last_name }}
                                        </option>
                                    @endforeach
                                    </select>
                                    @error('odgovoran')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <label  for="uputstvo">UPUTSTVO</label>
                                
                                    <select id="uputstvo"  
                                            class="form-control @error('uputstvo') is-invalid @enderror" 
                                            name="uputstvo" value="{{ old('uputstvo') }}"
                                            autofocus>
                                    <option value="" label="Uputstvo"></option>
                                    <option value="1">Vaga 1</option>
                                    <option value="2">Vaga 2</option>
                                    <option value="3">Vaga 3</option>
                                    </select>
                                    @error('uputstvo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-block">DODAJ MERILO</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <div class="calendar_events">
                <table class="table table-hover table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Naziv merne opreme</th>
                            <th scope="col">Proizvođač</th>
                            <th scope="col">Oznaka merila</th>
                            <th scope="col">Uputstvo</th>
                            <th scope="col">Odgovoran</th>
                            @if(!Auth::guest())
                            <th scope="col">Karton merila</th>
                            @endif
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($spisakMerila as $merilo)
                            <tr>
                                <th scope="row">{{ $merilo->id }}</th>
                                <td>{{ $merilo->naziv }}</td>
                                <td>{{ $merilo->proizvodjac }}</td>
                                <td>{{ $merilo->grupa }} {{ $merilo->oznaka }}</td>
                                <td>{{ $merilo->uputstvo }}</td>
                                <td>{{ $merilo->odgovoran }}</td>
                                @if(!Auth::guest())
                                <td>
                                        <a href="/mernaOprema/karton/{{ $merilo->id }}/create">Dodaj karton</a>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row ml-3">{{ $spisakMerila->links() }}</div> 
            </div>


            
                {{-- <!--SPISAK OPREME -->
            <div id="spisakMerneOpremeBlock" class="spisakMerneOpreme">
                <div class="box scaled">

                    <div class="row">
                        <div>
                            <h1>Spisak merne opreme</h1>
                        </div>
                    </div>
                    <table class="table">
                        <tr>
                            <td colspan="4">
                                STRAUSS ADRIATIC - PR
                                <img src="{{ asset('img/image1.jpg') }}" class="img">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>Spisak merne opreme</b>
                            </td>
                            <td colspan="2">
                                Obrazac broj: SG-SC-SA-PR-Ob.02.125-1
                            </td>
                        </tr>
                        <tr class="col-25">
                            <td>
                                <b>Strana 1 od 3</b>
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

                    <table class="table table-hover table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Naziv merne opreme</th>
                                <th scope="col">Proizvođač</th>
                                <th scope="col">Oznaka merila</th>
                                <th scope="col">Uputstvo</th>
                                <th scope="col">Odgovoran</th>
                            </tr>
                        </thead>
                        @foreach ($user->mernaOpremaSpisak as $merilo)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $merilo->id }}</th>
                                <td>{{ $merilo->naziv }}</td>
                                <td>{{ $merilo->proizvodjac }}</td>
                                <td>{{ $merilo->grupa }} {{ $merilo->oznaka }}</td>
                                <td>{{ $merilo->uputstvo }}</td>
                                <td>{{ $merilo->odgovoran }}</td>
                            </tr>
                        </tbody>  
                    @endforeach
                    </table>


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
            </div> --}}

            
</div>

@endsection
