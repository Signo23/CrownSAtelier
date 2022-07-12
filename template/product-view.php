<main>
<div class="m-5">
    <div class="row">
        <div class="col-12 col-md-4">
            <img src="./resources/img/products/<?php echo $templateParams['imgURL']?>" class="card-img-top" alt=""/>
        </div>
        <div class="col-12 col-md-5 mt-3 mt-md-0">
            <div class="border rounded p-4">
                <h1><?php echo $templateParams['nomeProdotto']?></h1>
                <p><?php echo $templateParams['descrizione']?></p>
            </div>
        </div>
        <div class="col-12 col-md-3 mt-3 mt-md-0">
            <div class="border rounded p-4">
                <h2>€ <?php echo $templateParams['prezzo']?> </h2>
                <form method="POST" action= "#">
                <button class="btn btn-success btn-labeled" type="submit" id="addToCart" name="addToCart"
                <?php if(!isUserLoggedIn()){
                        echo 'disabled';
                    }?> >
                    <span class="btn-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                            <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>
                    </span>
                    Aggiungi al carrello
                </button>
                </form>
                <hr class="bg-success border-2 border-top border-success"/>
                <button class="btn btn-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">Seleziona venditore</button>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h2 class="offcanvas-title" id="offcanvasExampleLabel">Seleziona venditore</h2>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

    <?php foreach ($templateParams['venditori'] as $venditore) : ?>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-12">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $venditore['nomeAzienda']?></h5>
                        <p class="card-text"><small class="text-muted">€ <?php echo $venditore['prezzo']?></small></p>
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="button" <?php if(!isUserLoggedIn()){
                        echo 'disabled';
                    }?> class="btn btn-sm btn-outline-secondary">Aggiungi al Carrello</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?>

    </div>
</div>
</main>