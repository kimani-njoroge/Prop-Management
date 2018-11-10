@extends('layouts.app')
@section('content')
    <h1>Edit proposal</h1>
    {!! Form::open(['action' => ['ProposalsController@update', $proposal->id], 'method'=> 'POST']) !!}
    <div class="form-group">
        {{Form::Label('title', 'Title')}}
        {{Form::text('title', $proposal->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::Label('proposal', 'Proposal')}}
        {{Form::textarea('proposal', $proposal->summary, ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Proposal'])}}
    </div>
    <div class="form-group">
        {{Form::Label('cost', 'Cost')}}
        {{Form::text('cost', $proposal->cost, ['class' => 'form-control', 'placeholder' => 'Cost'])}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection