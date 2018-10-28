@extends('layouts.base')
@section('content')
    <h1>Create proposal</h1>
    {!! Form::open(['action' => 'ProposalsController@store', 'method'=> 'POST']) !!}
    <div class="form-group">
        {{Form::Label('proposaltitle', 'Proposal Title')}}
        {{Form::text('proposaltitle', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::Label('proposal', 'Proposal')}}
        {{Form::textarea('proposal', '', ['class' => 'form-control', 'placeholder' => 'Proposal'])}}
    </div>
    <div class="form-group">
        {{Form::Label('cost', 'Cost')}}
        {{Form::text('cost', '', ['class' => 'form-control', 'placeholder' => 'Cost'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection