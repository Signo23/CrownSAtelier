<body class="text-center">

  <main class="form-signin">
    <img src="./resources/img/Logo.png" alt="" style="width: 150px;"/>
    <h1 class="h3 mb-3 fw-normal">Crea un nuovo account</h1>

    <form action="#" method="POST">

      <div class="form-floating mb-2">
        <input type="text" class="form-control" id="nome" name ="nome" placeholder="Mario" required>
        <label for="nome" >Nome</label>
      </div>

      <div class="form-floating mb-2">
        <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Rossi" required>
        <label for="cognome" >Cognome</label>
      </div>

      <div class="form-floating mb-2">
        <input type="tel" class="form-control" id="cellulare" name="cellulare" placeholder="1234567890" required>
        <label for="cellulare" >Cellulare</label>
      </div>

      <div class="form-floating mb-2">
        <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" required>
        <label for="email" >Email</label>
      </div>

      <div class="form-floating">
        <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
        <label for="password" >Password</label>
      </div>

      <hr class="my-4"/>
      <input class="w-100 btn btn-lg btn-success" type="submit" name="submit" value="Registrati"/>
    </form>

    <p class="mt-5 mb-3 text-muted">&copy; Crown's Atelier, 2022</p>
  </main>

</body>