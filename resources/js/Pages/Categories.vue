<template>
    <app-layout>
        <!-- header -->
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-right pb-2npm">
                Lista de Categorias
            </h2>

            <!-- Breadcrumb -->
            <!-- <div class="py-2 max-w-7xl mx-auto sm:px-6 lg:px-8"> -->
            <!-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4"> -->
            <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Home
                    </a>
                    </li>
                    <li>
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Categorias</a>
                    </div>
                    </li>
                    <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Listagem</span>
                    </div>
                    </li>
                </ol>
            </nav>
            <!-- </div> -->
            <!-- </div> -->
        </template>

        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <!-- <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert" v-if="$page.props.flash.message">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ $page.props.flash.message }}</p>
                            </div>
                        </div>
                    </div> -->

                    <button
                        @click="openForm()"
                        class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-2 px-4 rounded my-3">Nova Categoria</button>

                    <!-- table -->
                    <table class="table-fixed w-full posts-table rounded">
                        <thead>
                        <tr class="bg-gray-100 rounded">
                            <th class="px-4 py-2 w-20">No.</th>
                            <th class="px-4 py-2">Nome</th>
                            <th class="px-4 py-2">Rótulo</th>
                            <th class="px-4 py-2">Fundo</th>
                            <th class="px-4 py-2">Fonte</th>
                            <th class="px-4 py-2">Icone</th>
                            <th class="px-4 py-2">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in data.data" :key="item.id">
                                <td class="px-4 py-2 border">{{ item.id }}</td>
                                <td class="px-4 py-2 border">{{ item.name }}</td>
                                <td class="px-4 py-2 border">
                                    <span class="text-sm w-1/3 pb-1 font-semibold px-2 rounded-full" style="background-color: {{item.background_color}}!important; color: {{item.font_color}}!important;">
                                        {{ item.label }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 border">{{ item.background_color }}</td>
                                <td class="px-4 py-2 border">{{ item.font_color }}</td>
                                <td class="px-4 py-2 border"><!-- image --></td>
                                <td class="border px-4 py-2">
                                    <button
                                        @click="openForm(item)"
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Editar</button>
                                    <button
                                        @click="deleteItem(item)"
                                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Apagar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <pagination :links="data.links"></pagination>
                    <category-form :isOpen="isFormOpen" :isEdit="isFormEdit" :form="formObject" @formsave="saveItem" @formclose="closeModal"></category-form>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>

    const defaultFormObject = {
        name: null, label: null, background_color: null, font_color: null
    };

    import AppLayout from '@/Layouts/AppLayout.vue';
    import Pagination from '@/Components/Pagination.vue';
    import CategoryForm from '@/Components/Category/CategoryForm.vue';

    export default{
        props: ['data'],
        components: {
            AppLayout,
            Pagination,
            CategoryForm
        },
        data()
        {
            return{
                isFormOpen: false,
                isFormEdit: false,
                formObject: defaultFormObject
            }
        },
        methods: {
            saveItem(item){
                let url = '/categories';
                if (item.id){
                    url = '/categories/' + item.id;
                    item._method = 'PUT';
                }
                this.$inertia.post(url, item, {
                    onError: () => {

                    },
                    onSuccess: () => {
                        this.closeModal();
                    }
                });
            },
            closeModal(){
                this.isFormOpen = false;
            },
            openForm(item){
                this.isFormOpen = true;
                this.isFormEdit = !!item;
                this.formObject = item ? item:defaultFormObject;
                this.$page.props.errors = {};
            },
            deleteItem(item){
                if(window.confirm('Você tem certeza?')){
                    this.$inertia.post('/categories/' + item.id, {
                        _method: 'DELETE'
                    });
                }
            }
        }
    }

</script>
