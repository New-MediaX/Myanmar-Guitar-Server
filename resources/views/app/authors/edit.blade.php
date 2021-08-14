@extends('layouts.maindark')

@section('content')
<div id="app">
    <edit-author-component baseUrl="{{config('vars.server_base_url')}}" id="{{ request('id') }}"></edit-author-component>
</div>
@endsection