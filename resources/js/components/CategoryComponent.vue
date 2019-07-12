<template>
    <div>
        <select v-model="orderBy">
            <option value="">Ordenar</option>
            <option value="desc">Ordenar do menor para o maior</option>
            <option value="asc">Ordenar do menor para o maior</option>
        </select>
        <form id="category-form" :action="this.route" method="post" v-on:submit.prevent="submitForm">
            <h1>Cadastrar categorias</h1>
            <label>Nome</label>
            <input name="name" type="text" maxlength="25" class="form-control">
            <label>Descrição</label>
            <textarea name="description" class="form-control"></textarea>
            <label>
                <input type="checkbox" name="is_active" value="1"> Ativo
            </label>
            <div class="form-row">
                <input type="submit" class="btn btn-primary" value="Cadastrar categoria">
            </div>
        </form>
        <div>
            <h2>Categorias cadastradas</h2>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data de cadastro</th>
                    <th>Última alteração</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody> 
                <tr v-for="category, index in items" :key="category.id">
                    <td>{{ category.id }}</td>
                    <td>{{ category.name }}</td>
                    <td>{{ category.description }}</td>
                    <td v-bind:class="[category.is_active == 0 ? 'bg-danger' : 'bg-success']">
                        
                    </td>
                    <td>{{ category.created_at }}</td>
                    <td>{{ category.updated_at }}</td>
                    <td>
                        <button class="btn btn-outline-primary">Editar</button>
                        <button class="btn btn-outline-danger" @click="deleteCategory(category.id, index)">X</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['route', 'categories'],
        data: function() {
            return {
                items: this.categories,
                orderBy: ''
            }
        },
        methods: {
            submitForm: function() {
                axios.post(this.route, $('#category-form').serialize())
                .then(response => {
                    this.items.push(response.data.newCategory)
                    swal('Aviso', response.data.message, 'success')
                })
                .catch(error => {
                    for (var teste of error.response.data.errors.name) {
                        swal('Aviso',teste, 'warning')
                    }
                })
            },
            deleteCategory: function(itemId, index) {
                axios.delete(`${this.route}/${itemId}`)
                .then(response => {
                    this.$delete(this.items, index)
                    
                    swal('Aviso', response.data.message, 'success')
                })
            },
            listItems() {
                return _.orderBy(this.items, 'id', this.orderBy); 
            }
        },
        watch: {
            orderBy: function() {
                this.listItems()
            }
        },
    }
</script>