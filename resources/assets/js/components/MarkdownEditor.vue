<template>
    <textarea required="require" class="form-control" rows="20" style="overflow:hidden" id="reply_content" placeholder="请使用 Markdown 格式书写 ;-)，代码片段黏贴时请注意使用高亮语法。" name="body" cols="50"></textarea>
</template>

<script>
import SimpleMDE from "simplemde";

export default {
  props: ["body"],
  data() {
    return {
      data() {
        content: this.body;
      }
    };
  },
  mounted() {
    var simplemde = new SimpleMDE({
      spellChecker: false,
      autosave: {
        enabled: true,
        delay: 5000,
        unique_id: "article_content"
      },
      forceSync: true,
      toolbar: [
        "bold",
        "italic",
        "heading",
        "|",
        "quote",
        "code",
        "table",
        "horizontal-rule",
        "unordered-list",
        "ordered-list",
        "|",
        "link",
        "image",
        "|",
        "side-by-side",
        "fullscreen",
        "|",
        {
          name: "guide",
          action: function customFunction(editor) {
            var win = window.open(
              "https://github.com/riku/Markdown-Syntax-CN/blob/master/syntax.md",
              "_blank"
            );
            if (win) {
              //Browser has allowed it to be opened
              win.focus();
            } else {
              //Browser has blocked it
              alert("Please allow popups for this website");
            }
          },
          className: "fa fa-info-circle",
          title: "Markdown 语法！"
        },
        {
          name: "publish",
          action: function customFunction(editor) {
            $(".submit-btn").click();
          },
          className: "fa fa-paper-plane",
          title: "发布文章"
        }
      ]
    });
    simplemde.value(this.body.body);
  }
};
</script>

<style scoped>
@import "~simplemde/dist/simplemde.min.css";
@import "~codemirror/lib/codemirror.css";
@import "~highlight.js/styles/github.css";
</style>
