@extends('templates.admin')

@section('title', 'Cadastrar categoria')

@section('container')
    <a href="{{ route('category.index') }}" class="btn btn-outline-primary mt-2">Cadastrar categorias</a>
    @component('templates.simple-form')
        @section('form-title', 'Alterar categoria')

        @section('item-id', $category->id)

        @section('route', route('category.update', $category->id))

        @section('method')
            @method('PUT')
        @endsection

        @section('form-fields')
            @component('category.form')
                @section('name', $category->name)
                
                @section('description', $category->description)

                @section('is_active', $category->is_active)
            @endcomponent
        @endsection
    @endcomponent
    @component('category.table')
        @slot('categories', $categories)
    @endcomponent
@endsection