@extends('layouts.app')

@section('content')
<div class="panel-heading">
    Edit {{ $article->title }}
    <div class="pull-right">
        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-confirmation" data-id="{{ $article->id }}">
            Delete
        </button>
        <a href="{{ url('articles') }}" class="btn btn-xs btn-default">Back</a>
    </div>
</div>
<div class="panel-body">
    <form class="form" role="form" method="POST" action="{{ url('articles/'.$article->id) }}">
        {!! csrf_field() !!}
        {{ method_field('PUT') }}

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label class="control-label">Title</label>

            <input type="text" class="form-control" name="title" value="{{ old('title', $article->title) }}">

            @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
            <label class="control-label">Text</label>

            <textarea class="form-control" rows="9" name="text">{{ old('text', $article->text) }}</textarea>

            @if ($errors->has('text'))
            <span class="help-block">
                <strong>{{ $errors->first('text') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Update
            </button>
        </div>
    </form>
</div>
@include('articles._delete_confirmation_modal')
@endsection

@push('scripts')
<script>
    delete_url = "{{ url('articles') }}/"
</script>

<script src="{{ url('js/delete-confirmation.js') }}"></script>
@endpush