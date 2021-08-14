@extends('layouts.maindark')

@section('content')
<div id="app">
    <edit-album-component url="{{config('vars.server_base_url')}}" id="{{ request('id') }}"></edit-album-component>
</div>
@endsection