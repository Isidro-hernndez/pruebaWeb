
@extends('layouts.app')

@section('content')
    <h2>Editing Post</h2>
    @include('news._form', ['news' => $new])
@endsection
