/*jshint esversion: 6 */
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('nprogress/nprogress.css');

window.Vue = require('vue');
window.NProgress = require('nprogress');
window.$script = require("scriptjs");

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
require('nprogress/nprogress.css');
window.NProgress = require('nprogress');
window.octicon = require("octicons");

console.log(window.octicon['arrow-down'].path);
NProgress.start();

$script("//cdn.webfont.youziku.com/wwwroot/js/wf/youziku.api.min.js", function () {
    // $youziku.load("body", "28a6ef19107044efbfd1971c6bb8c919", "jdlibianjian");
    $youziku.load("body", "6e22bf1b5634469c9b6ac8ddb521e8c6", "HaTian-SuiXing");
    $youziku.draw();
    NProgress.done();
});

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    date() {
        return {
            octicon: ''
        };
    },
    created() {
        this.octicon = window.octicon;
    }
});