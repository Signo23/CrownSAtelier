<?php if(!isset($templateParams['orders']) ||  count($templateParams['orders'])==0 ): ?>
    <div class="d-flex">
        <h3 class="m-3">Nessun ordine<h3>
        <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_uqfbsoei.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
    </div>
<?php else: ?>
    <?php foreach($templateParams['orders'] as $order): ?>
        <div class="card m-2">
            <div class="card-header">
                Ordine: #<?php echo $order['nOrdine'];?>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $order['nome'];?></h5>
                <p class="card-text">
                    Data ordine: <?php echo $order['dataRichiesta'];?>
                </p>
                <div class="d-flex justify-content-end align-items-center">
                    <form method="POST" action="#">
                        <input class="d-none" type="text" name="idSeller" value=<?php echo $order['idFornitore']?>/> 
                        <input class="d-none" type="text" name="idItem" value=<?php echo $order['idProdotto']?>/> 
                        <input class="d-none" type="text" name="idOrder" value=<?php echo $order['nOrdine']?>/> 
                        <button type="submit" name="remove" class="btn btn-outline-success" <?php if($order['spedito'] == 1) {echo 'disabled';}?>><?php if($order['spedito'] == 1) {echo 'Spedito';} else {echo 'Spedisci';}?></button>
                    </form>
                </div>
            </div>
        </div>
<?php endforeach;?>
<?php endif; ?>