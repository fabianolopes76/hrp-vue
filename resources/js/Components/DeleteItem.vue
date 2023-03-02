<template>
<!-- Modal -->
    <div
        class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
        <div
        class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 text-white bg-danger-600 p-4 dark:border-opacity-50">

        <span class="mr-2">
            <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="h-5 w-5">
            <path
                fill-rule="evenodd"
                d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                clip-rule="evenodd" />
            </svg>
        </span>
        <h5
            class="text-xl font-medium leading-normal dark:text-neutral-200"
            id="exampleModalLabel">
            Cuidado! Ação irreversível!!!
        </h5>

        <button
            type="button"
            class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
            data-te-modal-dismiss
            aria-label="Close">
            <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="h-6 w-6">
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        </div>
        <div class="relative flex-auto p-4" data-te-modal-body-ref>
        Tem certeza que deseja apagar (nome do item).
        </div>
        <div
        class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
        <button
            type="button"
            class="inline-block rounded px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-primary-700 bg-primary-100
            transition duration-150 ease-in-out
            hover:bg-primary-accent-100
            focus:bg-primary-accent-100 focus:outline-none focus:ring-0
            active:bg-primary-accent-200"
            data-te-modal-dismiss
            data-te-ripple-init
            data-te-ripple-color="light">
            Cancelar
        </button>
        <button
            type="button"
            class="
            ml-1 inline-block rounded px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal shadow-[0_4px_9px_-4px_#DC4C64] text-white bg-danger-500
            transition duration-150 ease-in-out
            hover:bg-danger-700 hover:shadow-[0_8px_9px_-4px_rgba(200,76,100,0.3),0_4px_18px_0_rgba(200,76,100,0.2)]
            focus:bg-danger-700 focus:shadow-[0_8px_9px_-4px_rgba(200,76,100,0.3),0_4px_18px_0_rgba(200,76,100,0.2)] focus:outline-none focus:ring-0 active:bg-danger-700
            active:shadow-[0_8px_9px_-4px_rgba(200,76,100,0.3),0_4px_18px_0_rgba(200,76,100,0.2)]"
            data-te-ripple-init
            data-te-ripple-color="">
            Sim...Apagar!
        </button>
        </div>
    </div>
</template>

<script>

    export default {
        props: ['dataItem'],
    }

</script>
