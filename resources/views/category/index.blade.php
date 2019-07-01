@extends('templates.admin')

@section('title', 'Cadastrar produto')

@section('container')
    @component('templates.simple-form')
        @section('form-title', 'Cadastrar categoria')

        @section('route', route('category.store'))

        @section('form-fields')
            @include('category.form')        
        @endsection
    @endcomponent

    @component('category.table')
        @slot('categories', $categories)
    @endcomponent
@endsection