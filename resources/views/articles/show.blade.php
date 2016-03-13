@extends('layouts.app')

@section('content')
<div class="panel-heading">
    {{ $article->title }}
    <div class="pull-right">
        <a href="{{ url('articles') }}" class="btn btn-xs btn-default">Back</a>
    </div>
</div>
<div class="panel-body">
    <label class="control-label">Title</label>
    <p>{{ $article->title }}</p>

    <label class="control-label">Text</label>
    <p>{{ $article->text }}</p>
</div>
@endsection
