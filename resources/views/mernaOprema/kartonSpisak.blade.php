@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
        <div class="row col-md-6 mt-2">
            <h3 class="mx-auto">KARTONI MERNE OPREME</h3>
        </div>
    </div>
        

    <div class="calendar_events">
        <table class="table table-hover table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Naziv merne opreme</th>
                    <th scope="col">Proizvođač</th>
                    <th scope="col">Tip merila</th>
                    <th scope="col">Oznaka merila</th>
                    <th scope="col">Mesto ugradnje</th>
                    <th scope="col">Karton merila</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($kartonMerila as $karton)
                    <tr>
                        <th scope="row">{{ $karton->id }}</th>
                        <td>{{ $karton->naziv }}</td>
                        <td>{{ $karton->proizvodjac }}</td>
                        <td>{{ $karton->tip }}</td>
                        <td>{{ $karton->grupa }} {{ $karton->oznaka }}</td>
                        <td>{{ $karton->mestoUgradnje }}</td>
                        <td>
                            <a href="/mernaOprema/karton/{{ $karton->id }}/show">Otvori karton</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
        
        <div class="row ml-3">{{ $kartonMerila->links() }}</div> 
    </div>
              
</div>



@endsection
