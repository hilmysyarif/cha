@extends('layouts.app')

@section('content')
<div class="panel-heading">
    Create article
    <div class="pull-right">
        <a href="{{ url('articles') }}" class="btn btn-xs btn-default">Back</a>
    </div>
</div>
<div class="panel-body">
    <form class="form" role="form" method="POST" action="{{ url('articles') }}">
        {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label class="control-label">Title</label>

            <input type="text" class="form-control" name="title" value="{{ old('title') }}">

            @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
            <label class="control-label">Text</label>

            <textarea class="form-control" rows="9" name="text">{{ old('text') }}</textarea>

            @if ($errors->has('text'))
            <span class="help-block">
                <strong>{{ $errors->first('text') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Store
            </button>
        </div>
    </form>
</div>
@endsection
