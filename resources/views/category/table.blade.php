
<h2>Categorias cadastradas</h2>
<table class="table table-hover table-striped table-bordered my-2">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ativo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td class="{{ $category->is_active ? 'bg-success' : 'bg-danger' }}">
                    {{ $category->is_active ? 'Sim' : 'Não' }}
                </td>
                <td class="d-flex">
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-outline-primary mr-1">Editar</a>
                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" href="{{ route('category.destroy', $category->id) }}" class="btn btn-outline-danger">X</a>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Nenhuma categoria cadastrada</td>
            </tr>
        @endforelse
    </tbody>
</table>