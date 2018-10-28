@extends('layouts.base')
@section('content')
    <h1>proposals</h1>
    @if(count($proposals)> 0)
        @foreach($proposals as $proposal)
            <div class="well">
                <h3><a href="/proposals/{{$proposal->id}}">{{$proposal->proposaltitle}}</a></h3>
                <small>Prepared on {{$proposal->created_at}}</small>
            </div>
        @endforeach
    @else
        <p>No proposals yet.</p>
    @endif
@endsection