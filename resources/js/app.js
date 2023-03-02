import './bootstrap';
import '../css/app.css';
// import '../../dist/output.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
// import { store } from '../../resources/js/store/index';
import * as te from 'tw-elements';
import VueMeta from 'vue-meta';


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Harpia';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy, te, VueMeta)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
    onMounted() {
        window.addEventListener('popstate', ()=>{
            this.$page.popstate=true;
        })
    },
});
