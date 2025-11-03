import "./bootstrap";

import "preline";
import "flowbite";
import Alpine from "alpinejs";
import Editor from "@toast-ui/editor";
import "@toast-ui/editor/dist/toastui-editor.css";

window.Alpine = Alpine;
Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
  const editorElement = document.querySelector("#editor");
  if (!editorElement) return;

  // Buat editor Toast UI
  const editor = new Editor({
    el: editorElement,
    height: "500px",
    previewStyle: "vertical",
    initialEditType: "markdown",
    placeholder: "Masukkan content post...",
  });

  // Form CREATE
  const createForm = document.querySelector("#create-editor");
  if (createForm) {
    createForm.addEventListener("submit", () => {
      document.querySelector("#content").value = editor.getMarkdown();
    });
  }

  // Form EDIT
  const editForm = document.querySelector("#edit-editor");
  if (editForm) {
    const oldContent = document.querySelector("#old-editor");
    if (oldContent) editor.setMarkdown(oldContent.value);
    editForm.addEventListener("submit", () => {
      document.querySelector("#content").value = editor.getMarkdown();
    });
  }
});
