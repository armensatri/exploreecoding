import "./bootstrap";

import "preline";
import "flowbite";
import Alpine from "alpinejs";

// ALPINEJS
window.Alpine = Alpine;
Alpine.start();

// TOAS UI EDITOR MARKDOWN
const editor = new Editor({
  el: document.querySelector("#editor"),
  height: "500px",
  previewStyle: "vertical",
  initialEditType: "markdown",
});

if (document.querySelector("#create-editor")) {
  document.querySelector("#create-editor").addEventListener("submit", (e) => {
    e.preventDefault();
    document.querySelector("#content").value = editor.getMarkdown();
    e.target.submit();
  });
}

if (document.querySelector("#edit-editor")) {
  editor.setMarkdown(document.querySelector("#old-editor").value);
  document.querySelector("#edit-editor").addEventListener("submit", (e) => {
    e.preventDefault();
    document.querySelector("#content").value = editor.getMarkdown();
    e.target.submit();
  });
}
