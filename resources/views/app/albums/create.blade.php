@extends('layouts.maindark')

@section('content')
<div id="app">
    <create-album-component url="{{config('vars.server_base_url')}}"></create-album-component>
</div>
@endsection