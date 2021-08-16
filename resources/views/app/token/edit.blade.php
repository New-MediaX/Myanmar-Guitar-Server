@extends('layouts.maindark')

@section('content')
<div id="app">
    <token-component url="{{ config('vars.server_base_url') }}"></token-component>
</div>
@endsection