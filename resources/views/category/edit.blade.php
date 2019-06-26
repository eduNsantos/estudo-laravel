@extends('templates.admin')

@section('title', 'Cadastrar categoria')

@section('container')
    @component('category.form')
        @section('action', 'Alterar')

        @section('route', route('category.update', $category->id))

        @section('method')
            @method('PUT')
        @endsection

        @section('name', $category->name)

        @section('category-id', $category->id)
        
        @section('description', $category->description)

        @section('is_active', $category->is_active)
    @endcomponent
    <a href="{{ route('category.index') }}" class="btn btn-primary">Cadastrar categorias</a>
    @component('category.table')
        @slot('categories', $categories)
    @endcomponent
@endsection