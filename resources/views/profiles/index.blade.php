@extends('layouts.app')

@section('content')
<div class="container">

    <div class="jumbotron">
        <h1 class="display-4">Pozdrav, {{ $user->name}} {{ $user->last_name}}!</h1>
        <p class="lead">SVAKU GRESKU I PREDLOG UPISATI OVDE</p>
        <hr class="my-4">
        <p>DoncafeFactoryMaintenance</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Pogledaj podsetnik</a>
      </div>
</div>
@endsection
