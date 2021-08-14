@extends('layouts.maindark')

@section('content')
<div id="app">
    <edit-album-component id="{{ request('id') }}"></edit-album-component>
</div>
@endsection