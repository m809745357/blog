/*jshint esversion: 6 */
require('particles.js');

require('nprogress/nprogress.css');
window.NProgress = require('nprogress');

window.$script = require("scriptjs");

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    data() {
        return {
            loading: false,
            links: [
                {
                    name: 'Coding',
                    url: '/categories/1'
                },
                {
                    name: 'Photography',
                    url: '/categories/2'
                },
                {
                    name: 'Guitar',
                    url: '/categories/3'
                },
                {
                    name: 'Resume',
                    url: 'https://m809745357.github.io/resume/'
                },
                {
                    name: 'GitHub',
                    url: 'https://github.com/m809745357'
                },
            ]
        };
    },
    created() {
        NProgress.start();
    },
    mounted() {
        let that = this;

        particlesJS("particles-js", require('./particlesjs-config.json'));
        
        $script("//cdn.webfont.youziku.com/wwwroot/js/wf/youziku.api.min.js", function () {
            // $youziku.load("body", "28a6ef19107044efbfd1971c6bb8c919", "jdlibianjian");
            $youziku.load("body", "6e22bf1b5634469c9b6ac8ddb521e8c6", "HaTian-SuiXing");
            $youziku.draw();
            NProgress.done();
            that.loading = true;
        });
    }
});