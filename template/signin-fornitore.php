<body class="text-center">

  <main class="form-signin">
    <img src="./resources/img/Logo.png" alt="" style="width: 150px;"/>
    <h1 class="h3 mb-3 fw-normal">Crea un nuovo account</h1>

    <form action="#" method="POST">

      <div class="form-floating mb-2">
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" onchange=checkFormSignInFornitore() required>
        <label for="email">Email</label>
      </div>

      <div class="form-floating mb-2">
        <input type="password" class="form-control" id="password" name="password" placeholder="password" onchange=checkFormSignInFornitore() required>
        <label for="password">Password</label>
      </div>

      <div class="form-floating mb-2">
        <input type="text" class="form-control" id="nomeNegozio" name="nomeNegozio" placeholder="Nome Azienda S.N.C." onchange=checkFormSignInFornitore() required>
        <label for="nomeNegozio">Nome del negozio</label>
      </div>

      <div class="form-floating mb-2">
        <input type="number" class="form-control" id="partitaIVA" name="partitaIVA" placeholder="000000000000000000" onchange=checkFormSignInFornitore() required>
        <label for="partitaIVA">Partita IVA</label>
      </div>

      <div class="form-floating mb-2">
        <input type="text" class="form-control" id="indirizzo" name="indirizzo" placeholder=" Via Roma 1" onchange=checkFormSignInFornitore() required>
        <label for="indirizzo">Indirizzo</label>
      </div>

      <div class="form-floating">
        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="1234567890" onchange=checkFormSignInFornitore() required> 
        <label for="telefono">Telefono</label>
      </div>

      <hr class="my-4"/>
      <input class="w-100 btn btn-lg btn-success" type="submit" id="submit" name="submit" value="Registrati" disabled/>
    </form>

    <p class="mt-5 mb-3 text-muted">&copy; Crown's Atelier, 2022</p>
  </main>
</body>
