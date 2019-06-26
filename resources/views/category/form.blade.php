@if(session()->has('message'))
    <div class="alert alert-success mt-2">
        {{ session('message') }}
    </div>
@endif
<div class="border py-4 my-2">
    <form action="@yield('route')" method="post" class="col-6 mx-auto">
        @yield('method')
        <h1>@yield('action') categoria @yield('category-id')</h1>
        @csrf
        <div class="form-row">
            <label>Nome</label>
            <input type="text" maxlength="25" name="name" class="form-control" value="@yield('name') {{ old('name') }}">
        </div>
        <div class="form-row">
            <label>Descrição</label>
            <textarea name="description" class="form-control">@yield('description') {{ old('description') }}</textarea>
        </div>
        <div class="form-row">
            <label>
                <input type="checkbox" name="is_active" value="1" @hasSection('is_active') checked="checked" @endif>
                Ativo
            </label>
        </div>
        <div class="form-row">
            <div class="form-group">
                <input type="submit" value="@yield('action') categoria" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>