<body class="text-center">

      <main class="form-signin">
          <form action="#" method="POST">
            <img src="./resources/img/Logo.png" alt="" style="width: 300px"/>
            <h1 class="h3 mb-3 fw-normal">Accedi</h1>

            <div class="form-floating">
              <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
              <label for="email">Email</label>
            </div>
            <div class="form-floating">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              <label for="password">Password</label>
            </div>
            <input class="w-100 btn btn-lg btn-success" type="submit" name="submit" value="Invia"/>
          </form>
          <?php if(isset($templateParmas['errore'])): ?>
              <p class="mt-5 mb-3 text-danger"><?php echo $templateParmas['errore']?></p>
            <?php endif; ?>
          <p class="mt-5 mb-3 text-muted">Non hai un account? <a href="./signin.php">Registrati</a></p>
          <p class="mt-5 mb-3 text-muted"><a href="./index.php">Torna indietro</a> </p>
          <p class="mt-5 mb-3 text-muted">&copy; Crown's Atelier, 2022</p>
      </main>

</body>