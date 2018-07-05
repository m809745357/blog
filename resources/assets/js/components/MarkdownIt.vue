<template>
    <div>
        <div v-html="topic.body"></div>
        <div class="tw-flex tw-justify-center tw-items-center tw-fixed tw-pin-b tw-pin-r tw-mb-4 tw-mr-4 tw-text-green tw-bg-white" @click="back2top()" v-html="arrowUp"></div>
        <div class="tw-flex tw-justify-center tw-items-center tw-fixed tw-pin-t tw-pin-r tw-mr-4 tw-mt-4 tw-text-green tw-bg-white" @click="edit()" v-html="pencil"></div>
    </div>
</template>

<script>
import Typography from "typography";
import fairyGatesTheme from "typography-theme-fairy-gates";
import MarkdownIt from "markdown-it";
import NProgress from "nprogress";
import back2top from "back2top";
import octicon from "octicons";
import hljs from "highlight.js";

export default {
  props: ["body"],
  data() {
    return {
      topic: this.body,
      arrowUp: octicon["arrow-up"].toSVG({ class: "tw-w-4 tw-h-4" }),
      pencil: octicon["pencil"].toSVG({ class: "tw-w-4 tw-h-4" })
    };
  },
  created() {
    NProgress.start();
    var md = new MarkdownIt({
      highlight: function(str, lang) {
        if (lang && hljs.getLanguage(lang)) {
          try {
            return (
              '<pre class="hljs"><code>' +
              hljs.highlight(lang, str, true).value +
              "</code></pre>"
            );
          } catch (__) {}
        }

        return (
          '<pre class="hljs"><code>' +
          md.utils.escapeHtml(str) +
          "</code></pre>"
        );
      }
    });
    this.topic.body = md.render(this.topic.body);
  },
  mounted() {
    const typography = new Typography(fairyGatesTheme);
    typography.injectStyles();
    NProgress.done();
  },
  methods: {
    back2top() {
      back2top(0, 10);
    },
    edit() {
      window.location.href = `/topics/${this.topic.id}/edit`;
    }
  }
};
</script>

<style scoped>
@import "~nprogress/nprogress.css";
@import "~highlight.js/styles/github.css";
</style>
