<main>
    <div class="m-5">
        <h1>Benvenuti in Crown's Atelier</h1>
        <h4>Qui potrete trovare lo stile che più fa per voi con 
        una qualità garantita e con la consegna in giornata 
        direttamente nel Campus di Cesena.</h4>
    </div>
    <div class="row m-5 d-flex justify-content-center">
        <?php foreach($templateParams["categorie"] as $categoria): ?>
            <div class="card m-3" style="width: 18rem;">
                <img src="./resources/img/<?php echo $categoria['img']?>" class="card-img-top" alt="<?php echo $categoria['nomeCategoria'] ?>"/>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $categoria['nomeCategoria']; ?></h5>
                    <p class="card-text"><?php echo $categoria['descrizione']; ?></p>
                    <a href="lista-prodotti-categoria.php?id=<?php echo $categoria['idCategoria'];?>&search=<?php echo $categoria['nomeCategoria'];?>" class="btn btn-success stretched-link">Visualizza prodotti</a>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</main>