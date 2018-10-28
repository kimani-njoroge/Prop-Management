@extends('layouts.base')
@section('content')
    <a href="/proposals" class="btn btn-defsult">Go Back</a>
    <h1>{{$proposal->proposaltitle}}</h1>

    <div>
        {!! $proposal->proposal !!}
    </div>
    <hr>
    <small>Prepared on {{$proposal->created_at}}</small>
@endsection