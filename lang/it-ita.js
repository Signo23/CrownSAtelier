const index = {
    saluto: "Crown's Atelier/Ciao, xxx",
    descrizione: "EVENTUALE DESCRIZIONE"
};

$(document).ready(function () {
    $("main>div:first-child").append(`<h1>${index.saluto}</h1>
    <h2>${index.descrizione}</h2>`);
});