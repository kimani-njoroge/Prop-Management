@extends('layouts.app')
@section('content')
    <a href="/proposals" class="btn btn-defsult">Go Back</a>
    <h1>{{$proposal->proposaltitle}}</h1>

    <div>
        {!! $proposal->proposal !!}
    </div>
    <hr>
    <small>Prepared on {{$proposal->created_at}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $proposal->user_id)
            <a href="/proposals/{{$proposal->id}}/edit" class="btn btn-default">Edit</a>
            {!! Form::open(['action' => ['ProposalsController@destroy', $proposal->id],'method' => 'POST', 'class' => 'pull-right']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! Form::close()!!}
        @endif
    @endif
@endsection