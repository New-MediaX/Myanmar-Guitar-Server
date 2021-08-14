@extends('layouts.maindark')

@section('content')
<div id="app">
    <song-component baseUrl="{{config('vars.server_base_url')}}"></song-component>
</div>
@endsection