<template>
    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpen">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                <form ref="categoryForm" @submit.prevent>
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="">
                            <div class="mb-4">
                                <label for="formCategoryName"
                                       class="block text-gray-700 text-sm font-bold mb-2">Nome: </label>
                                <input type="text"
                                       v-model="dataItem.name"
                                       ref="formCategoryName"
                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       id="formCategoryName" placeholder="Nome">
                                <div v-if="$page.props.errors.name" class="text-red-500">{{ $page.props.errors.name }}</div>

                            </div>
                            <div class="mb-4">
                                <label for="formCategoryLabel"
                                       class="block text-gray-700 text-sm font-bold mb-2">Rótulo:</label>
                                <input type="text"
                                       v-model="dataItem.label"
                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       id="formCategoryLabel" placeholder="Rótulo">
                                <div v-if="$page.props.errors.label" class="text-red-500">{{ $page.props.errors.label }}</div>

                            </div>
                            <div class="mb-4">
                                <label for="formCategoryBackgroundColor"
                                       class="block text-gray-700 text-sm font-bold mb-2">Cor do Fundo:</label>
                                <input type="text"
                                       v-model="dataItem.background_color"
                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       id="formCategoryBackgroundColor" placeholder="Cor do Fundo">
                                <div v-if="$page.props.errors.background_color" class="text-red-500">{{ $page.props.errors.background_color }}</div>

                            </div>
                            <div class="mb-4">
                                <label for="formCategoryColor"
                                       class="block text-gray-700 text-sm font-bold mb-2">Cor da Fonte:</label>
                                <input type="text"
                                       v-model="dataItem.font_color"
                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       id="formCategoryColor" placeholder="Cor da Fonte">
                                <div v-if="$page.props.errors.font_color" class="text-red-500">{{ $page.props.errors.font_color }}</div>

                            </div>
                        </div>
                    </div>

                    <div class="bg-white px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                          <button  type="submit"
                                   v-if="!isEdit"
                                   @click="$emit('saveItem', dataItem)"
                                   data-te-ripple-init
                                   data-te-ripple-color="success-100"
                                   class = "inline-block rounded-full border-2 border-success px-6 pt-2 pb-[6px] text-xs font-medium uppercase leading-normal text-success transition duration-600 ease-in-out hover:border-success-600 hover:bg-neutral-100 hover:bg-opacity-10 hover:text-success-600 focus:border-success-600 focus:text-success-600 focus:outline-none focus:ring-0 active:border-success-700 active:text-success-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                          >
                            Salvar
                          </button>
                        </span>
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                          <button  type="submit"
                                   v-if="isEdit"
                                   @click="$emit('saveItem', dataItem)"

                                   class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-green-500/30 transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                          >
                            Atualizar
                          </button>
                        </span>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                          <button
                              type="button"
                              @click.esc="$emit('formClose')"
                              class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Cancelar
                          </button>
                        </span>
                    </div>
                </form>

            </div>
        </div>
    </div>
</template>

<script>

    export default {

        props: ['dataItem', 'isOpen', 'isEdit'],
        methods: {
            resetForm(){
                this.$refs.categoryForm.reset();
            }
        }
    }

</script>
