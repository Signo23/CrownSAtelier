<div class="container mb-5">
  <main>
    <div class="py-5 text-center">
      <img src="./resources/img/Logo.png" alt="" style="width: 300px;"/>
      <h1 class="h3 mb-3 fw-normal">Carrello</h1>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Il tuo carrello</span>
          <span class="badge bg-primary rounded-pill">(numero elementi)</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Nome prodotto (1)</h6>
              <small class="text-muted">Descrizione</small>
            </div>
            <span class="text-muted">€</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Nome prodotto (2)</h6>
              <small class="text-muted">Descrizione</small>
            </div>
            <span class="text-muted">€</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Nome prodotto (3)</h6>
              <small class="text-muted">Descrizione</small>
            </div>
            <span class="text-muted">€</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Totale (€)</span>
            <strong>€</strong>
          </li>
        </ul>
      </div>

      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Informazioni ordine</h4>
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nome" placeholder="" value="" required>
            </div>

            <div class="col-sm-6">
              <label for="cognome" class="form-label">Cognome</label>
              <input type="text" class="form-control" id="cognome" placeholder="" value="" required>
            </div>

            <div class="col-md-12">
              <label for="luogo" class="form-label">Luogo</label>
              <div class="google-maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2862.85168317362!2d12.233554751211303!3d44.14830267900504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132ca4dc575f4751%3A0x1ab32da6537902b2!2sVia%20Cesare%20Pavese%2C%2050%2C%2047521%20Cesena%20FC!5e0!3m2!1sit!2sit!4v1642718885434!5m2!1sit!2sit" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
            </div>

            <div class="col-md-6">
              <label for="data" class="form-label">Data</label>
              <input class="form-select" type="date" id="data" name="data" required/>
              <div class="invalid-feedback">
                Per favore scegli una data valida.
              </div>
            </div>

            <div class="col-md-6">
              <label for="orario" class="form-label">Orario</label>
              <input class="form-select" type="time" id="orario" name="orario" required/>
              <div class="invalid-feedback">
                Per favore scegli un orario valido.
              </div>
            </div>
          </div>

          <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="pagamento-alla-consegna">
            <label class="form-check-label" for="agamento-alla-consegna">Pagamento alla consegna.</label>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Procedi con l'ordine</button>
        </form>
      </div>
    </div>
  </main>

</div>
<script src="./js/form-validation.js"></script>