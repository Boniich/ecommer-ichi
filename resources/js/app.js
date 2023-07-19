import "./bootstrap";

import Alpine from "alpinejs";
import focus from "@alpinejs/focus";
import Swal from "sweetalert2";
window.Alpine = Alpine;
window.Swal = Swal;

// Swal.fire("Any fool can use a computer");

Alpine.plugin(focus);

Alpine.start();
