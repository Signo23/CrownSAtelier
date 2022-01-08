const index = {
    welcome: "Benvenuti in Crown's Atelier",
    desc: `Qui potete trovare lo stile che più fa per voi con 
    una qualità garantita e con la consegna in giornata 
    direttamente nel Campus di Cesena.
    `,
    viewProduct: "Visualizza prodotti",
};
const nav = {
    bag: "Carrello",
    notify: "Notifiche",
    user: "Utente",
    login: "Accedi/Registrati"
};


$(document).ready(function () {
    if($("title").text() == "Crown's Atelier") {
        $("main>div:first-child").append(`<h1>${index.welcome}</h1>
        <h4>${index.desc}</h4>`);
        $(".card-body>a").append(`${index.viewProduct}`);
    }
    $(".navbar-nav>li>a:last-child").append(`${nav.login}`);
});