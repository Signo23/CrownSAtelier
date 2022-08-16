<?php if(isset($_GET['action'])):?>
    <?php if($_GET['action'] == 2): ?>
        <div class="card m-2">
            <div class="card-header">
        </div>
        <div class="card-body">
            <h5 class="card-title">Nuovo prodotto</h5>
            <p class="card-text">Inserisci un prodotto non esistente nel sito<p>
            <a href="dashboard.php?id=seller-suppl&action=1" class="stretched-link"></a>
        </div>
        </div>
        <div class="card m-2">
            <div class="card-header">
            </div>
            <div class="card-body">
                <h5 class="card-title">Prodotto esistente</h5>
                <p class="card-text">Inserisci la tua disponibilità a fornire un prodotto presente nel sito<p>
                <a href="dashboard.php?id=seller-suppl&action=2" class="stretched-link"></a>
            </div>
        </div>
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