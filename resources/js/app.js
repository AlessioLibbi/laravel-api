import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

const Error = document.getElementById("errore-dinamico");

function eliminaErrore() {
    setTimeout(() => {
        Error.classList.add("scompi");
    }, 2000);
}

eliminaErrore();
