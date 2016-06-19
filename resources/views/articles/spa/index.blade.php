@extends('layouts.app')

@section('content')
<app>
@endsection

@section('template')
<template id="app-template">
  <div>
    <div class="panel-heading">
      List of Articles
      <div class="pull-right">
        <a class="btn btn-xs btn-default" data-toggle="modal" data-target="#create">
        <span class="glyphicon glyphicon-plus"></span>
        </a>
      </div>
    </div>

    <div class="panel-body">
      <table class="table" v-show="items.length != 0">
        <thead>
          <th>Title</th>
          <th></th>
        </thead>
        <tbody>
          <tr v-for="item in items" v-on:mouseover="activate(item)">
            <td>@{{ item.title }}</td>
            <td>
              <div class="pull-right action-buttons" v-show="item == active">
                <a class="btn btn-xs btn-default" data-toggle="modal" data-target="#show">
                  <span class="glyphicon glyphicon-search"></span>
                </a>
                <a class="btn btn-xs btn-default" data-toggle="modal" data-target="#edit" v-on:click="edit(item)">
                  <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a class="btn btn-xs btn-default" v-on:click="setState('deletion')" v-show="state == 'normal'">
                  <span class="glyphicon glyphicon-remove"></span>
                </a>

                @include('articles.spa.destroy')

              </div>
            </td>
          </tr>
        </tbody>
      </table>

      <div v-show="items.length == 0 && response.ok">
        There is nothing yet. Why don't you 
        <a data-toggle="modal" data-target="#create">create one?</a>
      </div>
      <div v-if="!response.ok">
        Request failed.
        <a v-on:click="index()">Retry</a>
      </div>
    </div>

    @include('articles.spa.create')
    @include('articles.spa.show')
    @include('articles.spa.edit')
  </div>
</template>
@endsection

@push('scripts')
<script src="{{ url('js/vue.js') }}"></script>
<script src="{{ url('js/vue-resource.min.js') }}"></script>
<script>
  _token = "{{ csrf_token() }}"
  items = {!! $articles !!}
</script>
<script src="{{ url('js/articles-spa.js') }}"></script>
@endpush