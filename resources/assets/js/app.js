/*jshint esversion: 6 */

import './bootstrap';

import NProgress from 'nprogress';
import octicon from 'octicons';
import Vue from 'vue';
import Datepicker from 'vuejs-datepicker';
import { zh } from 'vuejs-datepicker/dist/locale';
import moment from 'moment';
import array from 'lodash/array';

NProgress.start();

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('markdown-editor', require('./components/MarkdownEditor.vue'));
Vue.component('markdown-it', require('./components/MarkdownIt.vue'));

var state = {
    highlighted: {
        customPredictor: function (date) {
            return array.indexOf(allreleasesDates, moment(date).format('YYYY-MM-DD')) > -1;
        }
    },
    date: created_at == '' ? new Date() : created_at,
    language: zh
};

const app = new Vue({
    el: '#app',
    date() {
        return {
            octicon: '',
            state: '',
        };
    },
    components: {
        Datepicker
    },
    created() {
        this.state = state;
        NProgress.start();
        this.octicon = octicon;
    },
    mounted() {
        NProgress.done();
    },
    methods: {
        customFormatter(date) {
            return moment(date).format('YYYY-MM-DD');
        },
        doSomethingInParentComponentFunction(data) {
            window.location.href = `/topics?created_at=${this.customFormatter(data)}`;
        }
    }
});