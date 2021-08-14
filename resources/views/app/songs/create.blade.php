@extends('layouts.maindark')

@section('content')
<div id="app">
    <create-song-component url="{{config('vars.server_base_url')}}"></create-song-component>
</div>
@endsection