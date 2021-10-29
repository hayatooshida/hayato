@extends('layouts.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
@section('content')

@foreach($favorites as $favorite)
<img src="{{ asset($favorite->image) }}" width="180" height="200">
{{ $favorite->name }}
{{ $favorite->price }}
 
@endforeach

@endsection