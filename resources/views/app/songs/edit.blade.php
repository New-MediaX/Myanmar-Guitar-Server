@extends('layouts.maindark')

@section('content')
<div id="app">
    <edit-song-component id="{{ request('id') }}"></edit-song-component>
</div>
@endsection