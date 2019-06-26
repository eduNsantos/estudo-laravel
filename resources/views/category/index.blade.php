@extends('templates.admin')

@section('title', 'Cadastrar categoria')

@section('container')
    @component('category.form')
        @section('action', 'Cadastrar')

        @section('route', route('category.store'))
    @endcomponent

    @component('components.errors')
    @endcomponent


    @component('category.table')
        @slot('categories', $categories)
    @endcomponent
@endsection