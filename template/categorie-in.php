<div class="m-5">
</div>
<div class="m-5 d-flex justify-content-center overflow-auto">
    <?php foreach($templateParams["categorie"] as $categoria): ?>
        <div class="card m-3 w-25" style="width: 18rem;">
            <img src="./resources/img/<?php echo $categoria['img']?>" class="card-img-top" alt="<?php echo $categoria['nomeCategoria'] ?>"/>
            <div class="card-body">
                <h5 class="card-title"><?php echo $categoria['nomeCategoria']; ?></h5>
                <p class="card-text"><?php echo $categoria['descrizione']; ?></p>
                <a href="lista-prodotti-categoria.php" class="btn btn-primary"></a>
            </div>
        </div>
    <?php endforeach;?>
</div>