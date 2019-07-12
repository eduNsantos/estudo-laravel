@extends('templates.admin')

@section('title', 'Cadastrar categoria')

@section('container')
    <vc-category-index 
        route="{{ route('category.index') }}"
        :categories="{{ $categories }}">
    </vc-category-index>
@endsection