document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".prose pre").forEach((pre) => {
    const code = pre.querySelector("code");

    if (!code) return;

    // Membuat wrapper
    const wrapper = document.createElement("div");
    wrapper.className = "code-wrapper";

    // Bungkus <pre> dengan wrapper
    pre.parentNode.insertBefore(wrapper, pre);
    wrapper.appendChild(pre);

    // Tombol Copy
    const button = document.createElement("button");
    button.type = "button";
    button.className = "copy-btn";
    button.textContent = "Copy Code";

    button.addEventListener("click", async () => {
      try {
        await navigator.clipboard.writeText(code.innerText);

        button.textContent = "Copied ✓";

        setTimeout(() => {
          button.textContent = "Copy Code";
        }, 1500);
      } catch {
        button.textContent = "Failed";

        setTimeout(() => {
          button.textContent = "Copy Code";
        }, 1500);
      }
    });

    wrapper.appendChild(button);
  });
});
