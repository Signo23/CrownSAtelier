<form>
  <img src="./resources/img/Logo.png" alt="" style="width: 50px;"/>
  <p>Non sei ancora registrato?</p>
  <h1 class="h3 mb-3 fw-normal">Crea un nuovo account</h1>

  <form class="needs-validation" novalidate>
    <div class="form-floating">
      <label for="nome" class="form-label">Nome</label>
      <input type="text" class="form-control" id="nome" placeholder="" value="" required>
      <div class="invalid-feedback">
        Il nome &egrave; obbligatorio.
      </div>
    </div>
    <div class="form-floating">
      <label for="cognome" class="form-label">Cognome</label>
      <input type="text" class="form-control" id="cognome" placeholder="" value="" required>
      <div class="invalid-feedback">
        Il cognome &egrave; obbligatorio.
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
