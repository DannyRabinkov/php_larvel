import "./bootstrap";
import "bootstrap/dist/js/bootstrap.bundle.min.js";
import { Dropdown, Collapse } from "bootstrap";

function initBootstrapUI() {
    // Dropdowns: ensure instances exist
    document.querySelectorAll('[data-bs-toggle="dropdown"]').forEach((el) => {
        Dropdown.getOrCreateInstance(el);
    });

    // Navbar collapse: ensure instance exists
    document.querySelectorAll(".navbar-collapse").forEach((el) => {
        Collapse.getOrCreateInstance(el, { toggle: false });
    });

    // Extra safety: delegated click -> toggle dropdown manually
    document.addEventListener("click", (e) => {
        const toggle = e.target.closest('[data-bs-toggle="dropdown"]');
        if (!toggle) return;

        // prevent weird default actions if it's still an <a>
        e.preventDefault();
        Dropdown.getOrCreateInstance(toggle).toggle();
    });
}

// Run whether DOMContentLoaded already happened or not
if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initBootstrapUI);
} else {
    initBootstrapUI();
}
