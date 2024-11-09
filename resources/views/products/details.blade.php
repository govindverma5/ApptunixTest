@extends('layouts.app')

@section('content')
    @livewire('products.details', ['product' => $product])
@endsection