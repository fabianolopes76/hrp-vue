<template>
    <app-layout>
        <!-- header -->
        <template #header>
            <!-- Breadcrumb -->
            <nav v-if="breadcrumbs" class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li v-for="breadcrumb in breadcrumbs" class="inline-flex items-center">
                        <div v-if="breadcrumb.name == 'Home'" class="flex items-center">
                            <a :href=breadcrumb.link class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-gray-400 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                {{ breadcrumb.name }}
                            </a>
                        </div>
                        <div v-else class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a v-if="breadcrumb.link == '#'" class="ml-1 text-sm font-medium text-gray-700 md:ml-2 dark:text-gray-400">
                               {{ breadcrumb.name }}
                            </a>
                            <a v-else :href=breadcrumb.link class="ml-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                               {{ breadcrumb.name }}
                            </a>
                        </div>

                    </li>

                </ol>
            </nav>
        </template>

        <div class="py-5 max-w-7xl mx-auto text-end sm:px-6 lg:px-8">
            <div class="relative mt-6 mb-6 px-3 lg:mb-0">
                <h3 class="mb-0 text-3xl font-sm leading-tight text-primary dark:text-neutral-50">Lista de Categorias</h3>
            <div
                class="absolute top-0 right-0 hidden h-full min-h-[1em] w-px self-stretch border-6 bg-gradient-to-tr from-transparent via-neutral-500 to-transparent opacity-80 dark:opacity-100 lg:block"></div>
            </div>
        </div>

        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <div class="flex flex-wrap justify-between">
                        <div class="flex flex-col align-middle">
                            <button
                            type="button"
                            @click="openForm()"
                            data-te-ripple-init
                            data-te-ripple-color=""
                            data-te-toggle="popover"
                            data-te-placement="right"
                            data-te-content="Right popover"
                            title="Novo"
                            class = "inline-block rounded-lg border-0 border-success px-3 pt-3 pb-[12px] mt-2 ml-4 mb-4 text-sm font-light uppercase leading-normal text-white bg-success transition duration-150 ease-in-out shadow-[0_4px_9px_-4px_#14A44D]
                            hover:border-success-700 hover:bg-opacity-90 hover:text-white hover:font-bold
                            focus:border-success-700 focus:text-white focus:outline-none focus:ring-0
                            active:border-success-700 active:text-success-700
                            dark:hover:bg-neutral-100 dark:hover:bg-opacity-10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            </button>
                        </div>

                        <div class="flex flex-col">
                            <div class="flex justify-end">
                                <div class="mb-3 xl:w-96">
                                    <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                                    <input
                                        type="search"
                                        class="relative m-0 block w-[1%] min-w-0 flex-auto border-0 border-b-2 border-neutral-300 bg-transparent bg-clip-padding px-3 py-1.5 text-sm font-light text-neutral-700 outline-none transition duration-300 ease-in-out hover:shadow-lg hover:rounded hover:shadow-primary/30 focus:rounded focus:border-0 focus:border-primary-b-2 focus:text-neutral-700 focus:shadow-primary/30 focus:outline-none active:border-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
                                        placeholder="Pesquisar"
                                        aria-label="Pesquisar"
                                        aria-describedby="button-addon2" />

                                        <button
                                            @click="openForm(item)"
                                            data-te-ripple-init
                                            data-te-ripple-color="primary"
                                            class="inline-block rounded-lg border-none border-primary px-3 pt-3 pb-[15px] text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-primary-600 hover:bg-primary-500 hover:bg-opacity-10 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10">
                                            <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="primary"
                                            class="h-5 w-5">
                                            <path
                                                fill-rule="evenodd"
                                                d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                                clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- table -->
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-left text-sm font-light align-middle text-center">
                                    <!-- <table class="table-fixed w-full align-middle"> -->
                                        <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>
                                            <th class="px-4 py-2 w-20 align-middle text-center">#</th>
                                            <th scope="col" class="px-4 py-2 align-middle text-center">NOME</th>
                                            <th scope="col" class="px-4 py-2 align-middle text-center">RÓTULO</th>
                                            <th scope="col" class="px-4 py-2 align-middle text-center">AÇÃO</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="item in data.data" :key="item.id"
                                                class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600"
                                            >
                                                <td class="whitespace-nowrap px-4 py-2 font-bold align-middle text-center">{{ item.id }}</td>
                                                <td class="whitespace-nowrap px-4 py-2 align-middle text-center">{{ item.name }}</td>
                                                <td class="whitespace-nowrap px-4 py-2 align-middle text-center">
                                                    <span class="text-sm w-1/3 font-sm pb-1 pt-1 px-2 rounded-full"
                                                          :style="{ 'background-color': item.background_color, 'color': item.font_color }"
                                                    >
                                                        {{ item.label }}
                                                    </span>
                                                </td>
                                                <td class="whitespace-nowrap px-4 content-center" style="vertical-align: middle; text-align: center;">
                                                    <button
                                                        @click="openForm(item)"
                                                        data-te-ripple-init
                                                        data-te-ripple-color="primary"
                                                        class="inline-block rounded-lg border-none border-primary px-3 pt-3 pb-[15px] text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-primary-600 hover:bg-primary-500 hover:bg-opacity-10 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                        </svg>
                                                    </button>
                                                    <button
                                                        @click="deleteItem(item)"
                                                        data-te-ripple-init
                                                        data-te-ripple-color="danger"
                                                        class="inline-block rounded-lg border-none border-danger px-3 pt-3 pb-[15px] text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-danger-800 hover:bg-opacity-10 hover:text-danger-600 focus:border-danger-600 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-danger-700 active:text-danger-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <Pagination :links="data.links"></Pagination>
                    <CategoryForm ref="childForm" :isOpen="isFormOpen" :isEdit="isFormEdit" :dataItem="formObject" @saveItem="saveItem" @formClose="closeModal"></CategoryForm>
                    <Modal :show="modalShow">
                        <DeleteItem/>
                    </Modal>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>

    const defaultFormObject = {
        name: null, label: null, background_color: null, font_color: null
    };

    const resetFormObject = {};

    import AppLayout from '@/Layouts/AppLayout.vue';
    import Pagination from '@/Components/Pagination.vue';
    import CategoryForm from '@/Components/Category/CategoryForm.vue';
    import Modal from '@/Components/Modal.vue';
    import DeleteItem from '@/Components/DeleteItem.vue';

    export default{

        props: [
            'data',
            'breadcrumbs'
        ],

        components: {
            AppLayout,
            Pagination,
            CategoryForm,
            Modal,
            DeleteItem
        },

        data()
        {
            return{
                isFormOpen: false,
                isFormEdit: false,
                modalShow: false,
                formObject: defaultFormObject
            }
        },

        mounted() {
            this.resetFormObject = { ...this.defaultFormObject };
        },

        methods: {

            // Alterar a estrutura para Composition API
            // Converter as actions para uso do Vuex
            // Ajustar o inertia para receber o Vuex para operar

            saveItem(item){

                let url = '/categories';

                if (item?.id){
                    url = '/categories/' + item.id;
                    item._method = 'PUT';
                }

                this.$inertia.post(url, item, {
                    onError: () => {

                    },
                    onSuccess: () => {
                        this.item = resetFormObject;
                        console.log('form: ',resetFormObject);

                        this.formObject = resetFormObject;
                        this.$refs.childForm.resetForm();
                        console.log('formObject after resetForm(): ', this.formObject);
                        this.formObject.name = "";
                        this.formObject.label = "";
                        this.formObject.font_color = "";
                        this.formObject.background_color = "";
                        this.item.name = "";

                        console.log('item after resetForm(): ', item);

                        setTimeout(() => {
                            this.closeModal();
                        }, 250);
                    }
                });
            },

            closeModal(){
                this.isFormOpen = false;
            },

            openForm(item){
                this.isFormOpen = true;
                this.isFormEdit = !!item;
                this.formObject = item ? item : defaultFormObject;
                this.$page.props.errors = {};
            },

            deleteItem(item){
                this.modalShow = true;
                // if(window.confirm('Você tem certeza?')){
                    // this.$inertia.post('/categories/' + item.id, {
                    //     _method: 'DELETE'
                    // });
                // }
            }
        }
    }

</script>
