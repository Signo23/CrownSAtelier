<main>
<div class="m-5">
    <h1>Il tuo carrello</h1>
</div>

<div class="album py-5">
    <div class="container">

        <div class="row">
        <?php foreach($templateParams["prodotti"] as $prodotto): ?>
            <div class="card mb-3 d-flex">
                <div class="row g-0">
                    <div class="col-3 col-md-1 m-1">
                        <img class="mw-100" src="./resources/img/products/<?php echo $prodotto['imgURL'];?>" class="img-fluid rounded-start" alt=""/>
                    </div>
                    <div class="col-8 col-md-10">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $prodotto['nome'];?></h5>
                            <small class="text-muted">€ <?php echo $prodotto['prezzo'];?></small>
                            <p class="card-text">Quantità: <?php echo $prodotto['qnt'];?></p>
                            <div class="d-flex justify-content-end align-items-center">
                                <form method="POST" action="#">
                                    <input class="d-none" type="text" name="idSeller" value=<?php echo $prodotto['idFornitore']?>/> 
                                    <input class="d-none" type="text" name="idItem" value=<?php echo $prodotto['idProdotto']?>/> 
                                    <button type="submit" name="remove" class="btn btn-outline-danger">Rimuovi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        <?php endforeach;?>
        <?php if(count($templateParams["prodotti"])!= 0 ):?>
        <div class="d-grid gap-2 d-sm-flex justify-content-end">
            <strong>Totale: € <?php echo $templateParams['cartTotal']?></strong>
        </div>
        <div class="d-grid gap-2 d-sm-flex justify-content-end">
            <a href="./order-confirm.php" class="btn btn-outline-success">Procedi all'acquisto</a>
        </div>
        <?php else :?>
            <div class="d-flex justify-content-center">
            <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_ry4iluja.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player>
            </div>
            
        <?php endif;?>
      
    </div>
</div>

</main>
