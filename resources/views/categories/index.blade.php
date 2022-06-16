@extends('layouts.app')

@section('content')

<a href="{{ route('subcategories.index')}}">Danh mục phụ</a>
 @livewire('category-component')

@endsection
