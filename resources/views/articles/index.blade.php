@extends('layouts.app')

@section('content')
<div class="panel-heading">
    List of Articles
    <div class="pull-right">
        <a href="{{ url('articles/create') }}" class="btn btn-xs btn-default"><b>+ New</b></a>
    </div>
</div>

@if(!$articles->isEmpty())
<table class="table">
    <thead>
        <th>#</th>
        <th>Title</th>
        <th>Text</th>
        <th></th>
    </thead>
    <tbody>
        @foreach($articles as $key => $article)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>
                <a href="{{ url('articles/'.$article->id)}}">
                    {{ $article->title }}
                </a>
            </td>
            <td>{{ $article->text }}</td>
            <td>
                <div class="pull-right">
                    <a href="{{ url('articles/'.$article->id.'/edit') }}" class="btn btn-xs btn-warning">Edit</a>
                    <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-confirmation" data-id="{{ $article->id }}">
                      Delete
                  </button>
              </div>
          </td>
      </tr>
      @endforeach
  </tbody>
</table>
@else
<div class="panel-body">
    There is nothing yet.
    Why don't you 
    <a href="{{ url('articles/create') }}">make one?</a>
</div>
@endif
@include('articles._delete_confirmation_modal')
@endsection

@push('scripts')
<script>
    delete_url = "{{ url('articles') }}/"
</script>

<script src="{{ url('js/delete-confirmation.js') }}"></script>
@endpush