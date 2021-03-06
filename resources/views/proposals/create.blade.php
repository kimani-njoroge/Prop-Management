@extends('layouts.app')
@section('content')
    <h1>Create proposal</h1>
    {!! Form::open(['action' => 'ProposalsController@store', 'method'=> 'POST']) !!}
    <div class="form-group">
        {{Form::Label('title', 'Title')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::Label('summary', 'Proposal')}}
        {{Form::textarea('summary', '', ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Proposal'])}}
    </div>
    <div class="form-group">
        {{Form::Label('cost', 'Cost')}}
        {{Form::text('cost', '', ['class' => 'form-control', 'placeholder' => 'Cost'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection