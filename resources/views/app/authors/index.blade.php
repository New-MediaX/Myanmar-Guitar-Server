@extends('layouts.maindark')

@section('content')
<div id="app">
    <author-component url="{{config('vars.server_base_url')}}"></author-component>
</div>
@endsection