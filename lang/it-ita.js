const index = {
    saluto: "Benvenuti in Crown's Atelier",
    descrizione: `Qui potete trovare lo stile che più fa per voi con 
    una qualità garantita e con la consegna in giornata 
    direttamente nel Campus di Cesena.
    `,
    ricerca: "Visualizza prodotti",
};
const nav = {
    carrello: "Carrello",
    notifiche: "Notifiche",
    utente: "Utente",
    login: "Accedi/Registrati"
};

$(document).ready(function () {
    if($("title").text() == "Crown's Atelier") {
        $("main>div:first-child").append(`<h1>${index.saluto}</h1>
        <h4>${index.descrizione}</h4>`);
        $(".card-body>a").append(`${index.ricerca}`);
    }
    $(".navbar-nav>li>a:last-child").append(`${nav.login}`);
});