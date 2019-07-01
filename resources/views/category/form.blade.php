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
        <input type="checkbox" name="is_active" value="1" @hasSection('is_active') checked="checked" @endif {{ old('is_active') }}>
        Ativo
    </label>
</div>