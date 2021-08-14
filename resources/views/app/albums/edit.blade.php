@extends('layouts.maindark')

@section('content')
<div id="app">
    <edit-album-component baseUrl="{{config('vars.server_base_url')}}" id="{{ request('id') }}"></edit-album-component>
</div>
@endsection