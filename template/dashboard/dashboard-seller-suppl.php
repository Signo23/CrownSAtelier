<?php if(isset($_GET['action'])):?>
    <?php if($_GET['action'] == 2): ?>
        <div class="card m-2">
            <div class="card-header">
        </div>
        <div class="card-body">
            <h5 class="card-title">Nuovo prodotto</h5>
            <p class="card-text">Inserisci un prodotto non esistente nel sito<p>
            <a href="dashboard.php?form=1" class="stretched-link"></a>
        </div>
        </div>
        <div class="card m-2">
            <div class="card-header">
            </div>
            <div class="card-body">
                <h5 class="card-title">Prodotto esistente</h5>
                <p class="card-text">Inserisci la tua disponibilità a fornire un prodotto presente nel sito<p>
                <a href="dashboard.php?id=seller-suppl&action=4" class="stretched-link"></a>
            </div>
        </div>
    <?php elseif ($_GET['action'] == 1):?>
        <?php foreach($dbh->getProductForSeller($_SESSION['id']) as $prodotto): ?>
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="./resources/img/products/<?php echo $prodotto['imgURL'];?>" class="img-fluid rounded-start" alt=""/>
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $prodotto['nome'];?></h5>
                            <p class="card-text"><?php echo $prodotto['descrizione'];?></p>
                            <a href="dashboard.php?form=2" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        <?php elseif ($_GET['action'] == 4):?>
        <?php foreach($dbh->getProductNotForSeller($_SESSION['id']) as $prodotto): ?>
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="./resources/img/products/<?php echo $prodotto['imgURL'];?>" class="img-fluid rounded-start" alt=""/>
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $prodotto['nome'];?></h5>
                            <p class="card-text"><?php echo $prodotto['descrizione'];?></p>
                            <a href="dashboard.php?form=3" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    <?php endif;?>
<?php else: ?>
    <div class="card m-2">
        <div class="card-header">
    </div>
    <div class="card-body">
        <h5 class="card-title">Magazzino</h5>
        <p class="card-text">Manutenzione prodotti forniti<p>
        <a href="dashboard.php?id=seller-suppl&action=1" class="stretched-link"></a>
    </div>
    </div>
    <div class="card m-2">
        <div class="card-header">
        </div>
        <div class="card-body">
            <h5 class="card-title">Nuovo prodotto</h5>
            <p class="card-text">Inserimento nuovi prootti da fornire<p>
            <a href="dashboard.php?id=seller-suppl&action=2" class="stretched-link"></a>
        </div>
    </div>
<?php endif; ?>