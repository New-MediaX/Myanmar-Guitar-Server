@extends('layouts.maindark')

@section('content')
    <div id="app">
        <home-component baseUrl="{{config('vars.server_base_url')}}"></home-component>
    </div>
@endsection