@extends('layouts.app')
@section('content')
    <h1>proposals</h1>
    @if(count($proposals)> 0)
        @foreach($proposals as $proposal)
            <div class="well">
                <h3><a href="/proposals/{{$proposal->id}}">{{$proposal->title}}</a></h3>
                <small>Prepared on {{$proposal->created_at}} by {{$proposal->user->name}}</small>
            </div>
        @endforeach
    @else
        <p>No proposals yet.</p>
    @endif
@endsection