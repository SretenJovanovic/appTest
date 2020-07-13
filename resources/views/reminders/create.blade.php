@extends('layouts.app')

@section('content')
<div class="container mb-5">
    
    <div class="row mb-3">
        <a class="btn btn-primary" href="/reminder/{{ Auth::user()->id }}">Nazad</a>
    </div>
    <div class="row">

        <!-- FORMA PODSETNIKA 4 col -->
        <div class="col-md-4 formBorder bg-dark text-white">
            <form method="POST" action="/reminder" enctype="multipart/form-data">
                @csrf<!--Provera da li je user ulogovan-->
                    <div class="pt-3 text-center"><h2>Dodaj podsetnik</h2></div>
                    <div class="form-group mt-3">
                        <label  for="naslov">{{ __('Naslov:') }}
                        </label>

                        <div>
                            <input  id="naslov" 
                                type="text" 
                                class="form-control @error('naslov') is-invalid @enderror" 
                                name="naslov" value="{{ old('naslov') }}" 
                                autocomplete="off" autofocus
                                placeholder="Unesi naslov podsetnika...">

                             @error('naslov')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label  for="rok">{{ __('Rok:') }}
                        </label>

                        <div>
                            <input  id="rok" 
                                type="date" 
                                class="form-control @error('rok') is-invalid @enderror" 
                                name="rok" value="{{ old('rok') }}" autofocus>

                             @error('rok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label  for="prioritet">{{ __('Prioritet:') }}
                        </label>
                        <div>
                            <select id="prioritet"  
                                    class="form-control @error('prioritet') is-invalid @enderror" 
                                    name="prioritet" value="{{ old('prioritet') }}"
                                    autofocus>
                            <option value="" label="Izaberite prioritet">Izaberite prioritet</option>
                            <option value="nizak">Nizak</option>
                            <option value="srednji">Srednji</option>
                            <option value="visok">Visok</option>
                            </select>
                            @error('prioritet')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label  for="opis">{{ __('Opis:') }}
                        </label>

                        <div>
                            <textarea   class="form-control @error('opis') is-invalid @enderror" 
                                        type="text"
                                        name="opis"
                                        id="opis" rows="3" 
                                        value="{{ old('opis') }}" 
                                        placeholder="Unesi komentar...">
                            </textarea>
                             @error('opis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label  for="image">{{ __('Slika:') }}
                        </label>
                        <input type="file" class="form-control-file" id="image" name="image">
                        
                        @error('image')
                            <strong style="color:rgb(248, 76, 76)">{{ $message }}</strong>
                     @enderror
                    </div>
                <button class="btn btn-primary btn-block mb-3">Unesi podsetnik...</button>
            </form>
        </div>


        
    </div>
</div>
@endsection
