<template>
    <textarea required="require" class="form-control" rows="20" style="overflow:hidden" id="reply_content" placeholder="请使用 Markdown 格式书写 ;-)，代码片段黏贴时请注意使用高亮语法。" name="body" cols="50"></textarea>
</template>

<script>
import SimpleMDE from "simplemde";

export default {
  props: ["body"],
  data() {
    return {
      topic: this.body,
      simplemde: {},
    };
  },
  mounted() {
    var that = this;
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
    simplemde.value(this.topic.body);
    simplemde.codemirror.on("drop", function(editor, e) {
      if (!(e.dataTransfer && e.dataTransfer.files)) {
        alert("该浏览器不支持操作");
        return;
      }
      for (var i = 0; i < e.dataTransfer.files.length; i++) {
        console.log(e.dataTransfer.files[i]);
        fileUpload(e.dataTransfer.files[i]);
      }
      e.preventDefault();
    });
    simplemde.codemirror.on("paste", function(editor, e) {
      if (!(e.clipboardData && e.clipboardData.items)) {
        alert("该浏览器不支持操作");
        return;
      }
      for (var i = 0, len = e.clipboardData.items.length; i < len; i++) {
        var item = e.clipboardData.items[i];
        // console.log(item.kind+":"+item.type);
        if (item.kind === "string") {
          item.getAsString(function(str) {
            // str 是获取到的字符串
          });
        } else if (item.kind === "file") {
          var pasteFile = item.getAsFile();
          // pasteFile就是获取到的文件
          console.log(pasteFile);
          that.fileUpload(pasteFile);
        }
      }
    });
    this.simplemde = simplemde;
    window.addEventListener(
      "drop",
      function(e) {
        e = e || event;
        e.preventDefault();
        if (e.target.tagName == "textarea") {
          e.preventDefault();
        }
      },
      false
    );
  },
  methods: {
    fileUpload(file) {
      var that = this;
      let param = new FormData(); // 创建form对象
      param.append("upload_file", file); // 通过append向form对象添加数据
      console.log(param.get("file")); // FormData私有类对象，访问不到，可以通过get判断值是否传进去

      let config = {
        headers: { "Content-Type": "multipart/form-data" }
      };

      axios.post("/upload_image", param, config).then(({ data }) => {
        if (data.success) {
          let url = `![](${data.file_path})`;
          console.log(that.simplemde);
          let content = that.simplemde.value();
          that.simplemde.value(content + url + "\n");
        }
      });
    }
  }
};
</script>

<style scoped>
@import "~simplemde/dist/simplemde.min.css";
@import "~codemirror/lib/codemirror.css";
@import "~highlight.js/styles/github.css";
</style>
