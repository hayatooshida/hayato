@extends('layouts.app')

@section('title')
{{ $product->name }}
@endsection

@section('content')
この商品に対して、美味しかったボタンを押した人：{{ $favorites }}人
<div class="container">
    <div class="product">
        <img src="{{ asset($product->image) }}" class="product-img"/>
        <div class="product__content-header text-center">
            <div class="product__name">
                {{ $product->name }}
            </div>
            <div class="product__price">
                ¥{{ number_format($product->price) }}
            </div>
        </div>
        {{ $product->description }}
    </div>
</div>

<div>  @if(Auth::check())
           @if(Auth::user()->is_favoriting($product->id))
                        {!! Form::open(['route' => ['favorites.unfavorite',$product->id], 'method' => 'delete']) !!}
                          {!! Form::submit('美味しくなかった',['class' => "btn btn-warning btn-sm"]) !!}
                        {!! Form::close() !!}
           @else
                         {!! Form::open(['route' => ['favorites.favorite',$product->id]]) !!}
                           {!! Form::submit('美味しかった', ['class' => "btn btn-success btn-sm"]) !!}
                         {!! Form::close() !!}
           @endif
        @endif
</div>
@endsection
