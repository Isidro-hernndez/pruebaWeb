@extends('layouts.app')

@section('content')
    <h2>Creating Post</h2>
    @include('news._form', ['new' => $news])
@endsection
