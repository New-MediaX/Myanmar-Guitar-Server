@extends('layouts.maindark')

@section('content')
<div id="app">
    <edit-author-component id="{{ request('id') }}"></edit-author-component>
</div>
@endsection