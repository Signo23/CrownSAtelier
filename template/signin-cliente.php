<body class="text-center">

  <main class="form-signin">
    <img src="./resources/img/Logo.png" alt="" style="width: 150px;"/>
    <h1 class="h3 mb-3 fw-normal">Crea un nuovo account</h1>

    <form  method="POST" id="signupFormUser" class="needs-validation">

      <div class="form-floating mb-2">
        <input type="text" class="form-control" id="nome" name ="nome" placeholder="Mario" onchange=checkFormSignInCliente() required>
        <label for="nome">Nome</label>
      </div>

      <div class="form-floating mb-2">
        <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Rossi" onchange=checkFormSignInCliente() required>
        <label for="cognome" >Cognome</label>
      </div>

      <div class="form-floating mb-2">
        <input type="tel" class="form-control" id="cellulare" name="cellulare" placeholder="1234567890" onchange=checkFormSignInCliente() required>
        <label for="cellulare" >Cellulare</label>
      </div>

      <div class="form-floating mb-2">
        <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" onchange=checkFormSignInCliente() required>
        <label for="email" >Email</label>
      </div>

      <div class="form-floating">
        <input type="password" class="form-control" id="password" name="password" placeholder="password" onchange=checkFormSignInCliente() required>
        <label for="password" >Password</label>
      </div>

      <hr class="my-4"/>
      <input class="w-100 btn btn-lg btn-success" type="submit" id="submit" name="submit" value="Registrati" disabled/>
    </form>

    <p class="mt-5 mb-3 text-muted">&copy; Crown's Atelier, 2022</p>
  </main>

</body>