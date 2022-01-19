<form>
  <img src="./resources/img/Logo.png" alt="" style="width: 50px;"/>
  <p>Non sei ancora registrato?</p>
  <h1 class="h3 mb-3 fw-normal">Crea un nuovo account</h1>

  <form class="needs-validation" novalidate>
    <div class="form-floating">
      <label for="nomeNegozio" class="form-label">Nome del negozio</label>
      <input type="text" class="form-control" id="nomeNegozio" placeholder="" value="" required>
      <div class="invalid-feedback">
        Il nome del negozio &egrave; obbligatorio.
      </div>
    </div>
    <div class="form-floating">
      <label for="partitaIVA" class="form-label">Partita IVA</label>
      <input type="text" class="form-control" id="partitaIVA" placeholder="" value="" required>
      <div class="invalid-feedback">
        La partita IVA &egrave; obbligatoria.
      </div>
    </div>
    <div class="form-floating">
      <label for="indirizzo" class="form-label">Indirizzo</label>
      <input type="text" class="form-control" id="indirizzo" placeholder="" value="" required>
      <div class="invalid-feedback">
        L'indirizzo &egrave; obbligatorio.
      </div>
    </div>
    <div class="form-floating">
      <label for="cellulare" class="form-label">Cellulare</label>
      <input type="text" class="form-control" id="cellulare" placeholder="" value="" required>
      <div class="invalid-feedback">
        Il cellulare &egrave; obbligatorio.
      </div>
    </div>
    <div class="form-floating">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control" id="email" placeholder="" value="" required>
      <div class="invalid-feedback">
        L'email &egrave; obbligatoria.
      </div>
    </div>
    <div class="form-floating">
      <label for="password" class="form-label">Password</label>
      <input type="text" class="form-control" id="password" placeholder="" value="" required>
      <div class="invalid-feedback">
        La password &egrave; obbligatoria.
      </div>
    </div>
  </form>

  <hr class="my-4">

  <button class="w-100 btn btn-lg btn-primary" type="submit">Iscriviti</button>
  <p class="mt-5 mb-3 text-muted">&copy; Crown's Atelier, 2022</p>
</form>
