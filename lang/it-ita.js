const index = {
    saluto: "Crown's Atelier/Ciao, xxx",
    descrizione: "EVENTUALE DESCRIZIONE",
    ricerca: "Visualizza prodotti"
};

$(document).ready(function () {
    $("main>div:first-child").append(`<h1>${index.saluto}</h1>
    <h2>${index.descrizione}</h2>`);
    $(".card-body>a").append(`${index.ricerca}`);
});