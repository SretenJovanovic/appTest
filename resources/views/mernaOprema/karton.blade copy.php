@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="row col-md-6 mt-2">
                <h3 class="mx-auto">KARTONI MERNE OPREME</h3>
            </div>
            
            <!-- Button trigger modal -->
            @if(!Auth::guest())
                <button type="button" class="btn btn-primary btn-lg mb-3" data-toggle="modal" data-target="#exampleModal">
                    Dodaj novi karton merila
                </button>
            @endif
        </div>
            <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg col-md-8 mx-auto text-white pt-2 pb-3 mb-3" role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h3 class="modal-title col-md-6 mx-auto" id="exampleModalLabel">KARTON MERILA</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="text-white" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <!--FORMA-->
                        <form action="/mernaOprema/karton" method="POST" enctype="multipart/form-data">
                            @csrf<!--Provera da li je user ulogovan-->  
                           <div class="row">
                            <div class="form-group col-md-6">
                                <label  for="naziv">Naziv</label>
                                
                                    <select id="naziv"  
                                            class="form-control @error('naziv') is-invalid @enderror" 
                                            name="naziv" value="{{ old('naziv') }}"
                                            autofocus>
                                            {{-- @foreach ($user->mernaOpremaSpisak as $merilo)
                                            <option value="{{ $merilo->naziv }}">{{ $merilo->naziv }}</option>
                                            @endforeach --}}
                                    </select>
                                    @error('naziv')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label  for="grupa">grupa</label>
                                
                                    <select id="grupa"  
                                            class="form-control @error('grupa') is-invalid @enderror" 
                                            name="grupa" value="{{ old('grupa') }}"
                                            autofocus>
                                           
                                            <option value="1">1</option>
                                    </select>
                                    @error('grupa')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label  for="oznaka">oznaka</label>
                                
                                    <select id="oznaka"  
                                            class="form-control @error('oznaka') is-invalid @enderror" 
                                            name="oznaka" value="{{ old('oznaka') }}"
                                            autofocus>
                                           
                                            <option value="1">1</option>
                                    </select>
                                    @error('oznaka')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label  for="proizvodjac">proizvodjac</label>
                                
                                    <select id="proizvodjac"  
                                            class="form-control @error('proizvodjac') is-invalid @enderror" 
                                            name="proizvodjac" value="{{ old('proizvodjac') }}"
                                            autofocus>
                                           
                                            <option value="1">1</option>
                                    </select>
                                    @error('proizvodjac')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label  for="mestoUgradnje">Mesto ugradnje</label>
                                
                                    <select id="mestoUgradnje"  
                                            class="form-control @error('mestoUgradnje') is-invalid @enderror" 
                                            name="mestoUgradnje" value="{{ old('mestoUgradnje') }}"
                                            autofocus>
                                    <option value="Laboratorija">Laboratorija</option>
                                    <option value="Mlinovi">Mlinovi</option>
                                    <option value="Proizvodnja">Proizvodnja</option>
                                    </select>
                                    @error('mestoUgradnje')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                            </div>
                           </div>
                            
                           <div class="row">
                            <div class="form-group col-md-4">
                                <label  for="serijskiBroj">Broj Masine/Serijski broj
                                </label>
                                <input  id="serijskiBroj" 
                                    type="text" 
                                    class="form-control @error('serijskiBroj') is-invalid @enderror" 
                                    name="serijskiBroj" value="{{ old('serijskiBroj') }}" 
                                    autocomplete="off" autofocus
                                    placeholder="Unesi serijski broj...">
    
                                @error('serijskiBroj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label  for="tip">Tip
                                </label>
                                <input  id="tip" 
                                    type="text" 
                                    class="form-control @error('tip') is-invalid @enderror" 
                                    name="tip" value="{{ old('tip') }}" 
                                    autocomplete="off" autofocus
                                    placeholder="Tip merila...">
    
                                @error('tip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label  for="godinaProizvodnje">Godina proizvodnje
                                </label>
                                <input  id="godinaProizvodnje" 
                                    type="number" minlength="4" maxlength="4"
                                    class="form-control @error('godinaProizvodnje') is-invalid @enderror" 
                                    name="godinaProizvodnje" value="{{ old('godinaProizvodnje') }}" 
                                    autocomplete="off" autofocus
                                    placeholder="Godina proizvodnje merila...">
    
                                @error('godinaProizvodnje')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           </div>
                            
                           <div class="row">
                            <div class="form-group col-md-4">
                                <label  for="datumNabavke">Datum nabavke
                                </label>
                                <input  id="datumNabavke" 
                                    type="text" 
                                    class="form-control @error('datumNabavke') is-invalid @enderror" 
                                    name="datumNabavke" value="{{ old('datumNabavke') }}" 
                                    autocomplete="off" autofocus
                                    placeholder="Datum nabavke merila...">
    
                                @error('datumNabavke')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label  for="merniOpseg">Merni opseg
                                </label>
                                <input  id="merniOpseg" 
                                    type="text" 
                                    class="form-control @error('merniOpseg') is-invalid @enderror" 
                                    name="merniOpseg" value="{{ old('merniOpseg') }}" 
                                    autocomplete="off" autofocus
                                    placeholder="Merni opseg merila...">
    
                                @error('merniOpseg')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label  for="klasaTacnosti">Klasa tacnosti
                                </label>
                                <input  id="klasaTacnosti" 
                                    type="text" 
                                    class="form-control @error('klasaTacnosti') is-invalid @enderror" 
                                    name="klasaTacnosti" value="{{ old('klasaTacnosti') }}" 
                                    autocomplete="off" autofocus
                                    placeholder="Klasa tacnosti merila...">
    
                                @error('klasaTacnosti')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           </div>
                            
                           <div class="row">
                            <div class="form-group col-md-4">
                                <label  for="klasifikacioniBroj">Klasifikacioni broj
                                </label>
                                <input  id="klasifikacioniBroj" 
                                    type="text" 
                                    class="form-control @error('klasifikacioniBroj') is-invalid @enderror" 
                                    name="klasifikacioniBroj" value="{{ old('klasifikacioniBroj') }}" 
                                    autocomplete="off" autofocus
                                    placeholder="Klasifikacioni broj merila...">
    
                                @error('klasifikacioniBroj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label  for="pratecaDokumentacija">Prateca dokumentacija
                                </label>
                                <input  id="pratecaDokumentacija" 
                                    type="text" 
                                    class="form-control @error('pratecaDokumentacija') is-invalid @enderror" 
                                    name="pratecaDokumentacija" value="{{ old('pratecaDokumentacija') }}" 
                                    autocomplete="off" autofocus
                                    placeholder="Prateca dokumentacija...">
    
                                @error('pratecaDokumentacija')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label  for="pratecaOprema">Prateca oprema
                                </label>
                                <input  id="pratecaOprema" 
                                    type="text" 
                                    class="form-control @error('pratecaOprema') is-invalid @enderror" 
                                    name="pratecaOprema" value="{{ old('pratecaOprema') }}" 
                                    autocomplete="off" autofocus
                                    placeholder="Prateca oprema...">
    
                                @error('pratecaOprema')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           </div>
                            

                            <div class="form-group">
                                <label  for="napomena">Napomena
                                </label>
                                <input  id="napomena" 
                                    type="text" 
                                    class="form-control @error('napomena') is-invalid @enderror" 
                                    name="napomena" value="{{ old('napomena') }}" 
                                    autocomplete="off" autofocus
                                    placeholder="Napomena...">
    
                                @error('napomena')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            
                            <button type="submit" class="btn btn-primary btn-block">DODAJ KARTON</button>
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
                        </tr>
                    </thead>
{{--                     
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
                    @endforeach --}}
                </table>
            </div>
            
</div>



@endsection
