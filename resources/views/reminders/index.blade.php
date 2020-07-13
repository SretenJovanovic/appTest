@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="row col-md-6 mt-2">
            <h3 class="mx-auto">LISTA ZADATAKA</h3>
        </div>
        
        <!-- Button trigger modal -->
        @if(!Auth::guest())
        <a class="btn btn-primary btn-lg mb-3" href="/reminder/create">Dodaj novi podsetnik</a>
        @endif
    </div>

    <div>
        <div class="calendar_events">
            <table class="table table-hover table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NASLOV</th>
                        <th scope="col">ROK</th>
                        <th scope="col">PRIORITET</th>
                        <th scope="col">OPIS</th>
                        <th scope="col">SLIKA</th>
                        <th scope="col">OBRISI</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($user->reminders as $reminder)
                        <tr>
                            <th scope="row">{{ $reminder->id }}</th>
                            <td>{{ $reminder->naslov }}</td>
                            <td>{{ $reminder->rok }}</td>
                            <td>{{ $reminder->prioritet }}</td>
                            <td>{{ $reminder->opis }}</td>
                            <td>
                                <a href="{{ $reminder->reminderImage() }}">
                                    <img style="height:50px" src="{{ $reminder->reminderImage() }}" alt="Picture">
                                </a>
                            </td>
                            <td><a href="#">Obrisi</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>


</div>
@endsection
