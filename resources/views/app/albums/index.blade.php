@extends('layouts.maindark')

@section('content')
<div id="app">
    <album-component baseUrl="{{config('vars.server_base_url')}}"></album-component>
</div>
@endsection