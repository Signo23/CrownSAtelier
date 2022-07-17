<div class="container mb-5">
  <main>
    <div class="py-5 text-center">
      <img src="./resources/img/Logo.png" alt="" style="width: 300px;"/>
      <h1 class="h3 mb-3 fw-normal">Carrello</h1>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-success">Il tuo carrello</span>
          <span class="badge bg-success rounded-pill"><?php echo $templateParams["nItems"];?></span>
        </h4>
        <ul class="list-group mb-3">
        <?php foreach($templateParams["cartItems"] as $item): ?>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><?php echo $item['nome']; ?></h6>
              <small class="text-muted"><?php echo $item['qnt']?></small>
            </div>
            <span class="text-muted"><?php echo round(($item['qnt'] * $item['prezzo']), 2, PHP_ROUND_HALF_DOWN); ?>€</span>
          </li>
        <?php endforeach; ?>
          <li class="list-group-item d-flex justify-content-between">
            <span>Totale (€)</span>
            <strong><?php echo $templateParams['cartTotal']?>€</strong>
          </li>
        </ul>
      </div>

      <div class="col-md-7">
        <h4 class="mb-3">Informazioni ordine</h4>
        <form class="needs-validation" novalidate method="POST" action= "#">
          <div class="row g-3">

            <div class="col-md-12">
              <label for="luogo" class="form-label">Luogo</label>
              <div class="google-maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2862.85168317362!2d12.233554751211303!3d44.14830267900504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132ca4dc575f4751%3A0x1ab32da6537902b2!2sVia%20Cesare%20Pavese%2C%2050%2C%2047521%20Cesena%20FC!5e0!3m2!1sit!2sit!4v1642718885434!5m2!1sit!2sit" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
            </div>
          </div>

          <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" name="pagamento" id="pagamento" value="true" checked required>
            <label class="form-check-label" for="pagamento">Pagamento alla consegna</label>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-success btn-lg" type="submit">Procedi con l'ordine</button>
        </form>
        <a class="w-100 btn btn-danger btn-lg my-1" href="index.php">Annulla</a>
      </div>
    </div>
  </main>

</div>
