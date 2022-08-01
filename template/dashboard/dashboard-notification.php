<?php if(!isset($templateParams['notication']) ||  count($templateParams['notication'])==0 ): ?>
    <div class="d-flex">
        <h3 class="m-3">Nessuna notifica<h3>
        <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_c5woctcf.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
    </div>
<?php else: ?>
    <?php foreach($templateParams['notication'] as $notif): ?>
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $notif['descrizione'];?></h5>
                <p class="card-text"><?php echo $notif['data'];?></p>
            </div>
        </div>
    <?php endforeach;?>
<?php endif; ?>