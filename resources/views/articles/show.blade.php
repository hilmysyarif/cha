@extends('layouts.app')

@section('content')
<div class="panel-heading">
	{{ $article->title }}
	<div class="pull-right">
		<a href="{{ url('articles/'.$article->id.'/edit') }}" class="btn btn-xs btn-warning">Edit</a>
		<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-confirmation" data-id="{{ $article->id }}">
			Delete
		</button>
		<a href="{{ url('articles') }}" class="btn btn-xs btn-default">Back</a>
	</div>
</div>
<div class="panel-body">
	<label class="control-label">Title</label>
	<p>{{ $article->title }}</p>

	<label class="control-label">Text</label>
	<p>{{ $article->text }}</p>
</div>
@include('articles._delete_confirmation_modal')
@endsection

@push('scripts')
<script>
    delete_url = "{{ url('articles') }}/"
</script>

<script src="{{ url('js/delete-confirmation.js') }}"></script>
@endpush