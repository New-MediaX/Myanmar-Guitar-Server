@extends('layouts.maindark')

@section('content')
<div id="app">
    <create-author-component url="{{config('vars.server_base_url')}}"></create-author-component>
</div>
@endsection