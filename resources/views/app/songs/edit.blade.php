@extends('layouts.maindark')

@section('content')
<div id="app">
    <edit-song-component url="{{ config('vars.server_base_url') }}" id="{{ request('id') }}"></edit-song-component>
</div>
@endsection