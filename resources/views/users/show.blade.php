@extends('layouts.app')
@section('content')

{!! link_to_route('user.favorites','美味しかったボタンを押した商品',['favorites' => $user->id]) !!}{{ $user->favorites_count }}個<br />
<p>{{ $user->name }}</p>
<p>{{ $user->email }}</p>

@endsection