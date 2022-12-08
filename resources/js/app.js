import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
// import axios from 'axios';

import Chat from './Components/Messages.vue';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });

// const form = document.getElementById('form');
// createApp(Chat).mount('#app');
createApp({
    components: {
        Chat
    }
})
.mount('#app');



// form.addEventListener('submit', function(event){
//     event.preventDefault();
//     const channel = window.Echo.private('private.chat.1');
//     const ul = document.getElementById('list-messages');
//     const li = document.createElement('li');
//     const strong = document.createElement('strong');
//     channel.subscribed(() => {
//         console.log('subscribed');
//     }).listen('.chat-message', (event) => {
//         console.log(event);
//         li.textContent = '<b>('+event.time+')</b>'+ event.name +': '+event.message;
//         ul.appendChild(li);
//     });

//     const userInput = document.getElementById('input-message').value;

//     axios.post('/chat-message', {
//         message: userInput
//     });

   
// })
