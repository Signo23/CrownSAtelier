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
            </div>
        </div>
    <?php endforeach;?>
<?php endif; ?>