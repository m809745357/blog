/*jshint esversion: 6 */

import './bootstrap';

import NProgress from 'nprogress';
import octicon from 'octicons';
import Vue from 'vue';

NProgress.start();

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('markdown-editor', require('./components/MarkdownEditor.vue'));
Vue.component('markdown-it', require('./components/MarkdownIt.vue'));

const app = new Vue({
    el: '#app',
    date() {
        return {
            octicon: ''
        };
    },
    created() {
        NProgress.start();
        this.octicon = octicon;
    },
    mounted() {
        NProgress.done();
    },
});