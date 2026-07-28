document.addEventListener("DOMContentLoaded", () => {
  const article = document.querySelector("#daftar-isi-tipscoding");
  const toc = document.querySelector("#toc");

  if (!article || !toc) return;

  const headings = article.querySelectorAll("h2, h3, h4");

  headings.forEach((heading) => {
    if (!heading.id) return;

    const li = document.createElement("li");
    const a = document.createElement("a");

    a.href = `#${heading.id}`;
    a.dataset.target = heading.id;

    // Tambahkan icon berdasarkan level heading
    if (heading.tagName === "H2" || heading.tagName === "H3") {
      a.textContent = `🔹 ${heading.textContent}`;
    } else if (heading.tagName === "H4") {
      a.textContent = `-- ${heading.textContent}`;
    }

    a.classList.add(
      "flex",
      "items-center",
      "gap-2",
      "block",
      "py-1",
      "text-base",
      "font-normal",
      "text-gray-700",
      "hover:text-green-600",
      "transition-colors",
      "duration-200",
    );

    // Indent H4
    if (heading.tagName === "H4") {
      a.classList.add("ml-8");
    }

    li.appendChild(a);
    toc.appendChild(li);
  });

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;

        // Reset semua active
        toc.querySelectorAll("a").forEach((link) => {
          link.classList.remove("text-green-600");
          link.classList.add("text-gray-700");
        });

        // Tambahkan active
        const activeLink = toc.querySelector(
          `a[data-target="${entry.target.id}"]`,
        );

        if (activeLink) {
          activeLink.classList.remove("text-gray-700");
          activeLink.classList.add("text-green-600");
        }
      });
    },
    {
      rootMargin: "-80px 0px -70% 0px",
    },
  );

  headings.forEach((heading) => observer.observe(heading));

  // Smooth scroll
  toc.addEventListener("click", (e) => {
    const link = e.target.closest("a");

    if (!link) return;

    e.preventDefault();

    document.getElementById(link.dataset.target)?.scrollIntoView({
      behavior: "smooth",
      block: "start",
    });
  });
});
