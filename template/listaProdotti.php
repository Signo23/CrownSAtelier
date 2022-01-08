<div class="m-5">
    <h1>Risultati per "xxx"</h1>
</div>

<div class="album py-5">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach($templateParams["prodotti"] as $prodotto): ?>
            <div class="card mb-3 d-md-none" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="./resources/img/products/<?php echo $prodotto['imgURL'];?>" class="img-fluid rounded-start" alt=""/>
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $prodotto['nome'];?></h5>
                            <p class="card-text"><?php echo $prodotto['descrizione'];?></p>
                            <a href="product.php" class="stretched-link"></a>
                            <div class="d-flex justify-content-end align-items-center">
                                <small class="text-muted">€ <?php echo $prodotto['prezzo'];?></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col d-none d-md-flex">
                <div class="card shadow-sm"> 
                    <img src="./resources/img/products/<?php echo $prodotto['imgURL'];?>" class="card-img-top" alt=""/>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $prodotto['nome'];?></h5>
                        <p class="card-text"><?php echo $prodotto['descrizione'];?></p>
                        <a href="product.php" class="stretched-link"></a>
                        <div class="d-flex justify-content-end align-items-center">
                            <small class="text-muted">€ <?php echo $prodotto['prezzo'];?></small>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        </div>
      
    </div>
</div>

