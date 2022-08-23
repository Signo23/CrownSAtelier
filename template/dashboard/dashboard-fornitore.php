<form method="POST" action="dashboard.php">
  <div class="row">
  <div class="mb-3 col-12 col-md-4">
        <label for="nome" class="form-label">Nome azienda</label>
        <input type="text" class="form-control" id="nomeAzienda" name="nomeAzienda" onchange="checkFormUser()"
         value=<?php echo  $_SESSION["user"]['nomeAzienda']?>>
    </div>
    <div class="mb-3 me-4 col-12 col-md-4">
        <label for="cognome" class="form-label">Indirizzo</label>
        <input type="text" class="form-control" id="indirizzo" name="indirizzo" onchange="checkFormUser()"
         value=<?php echo  $_SESSION["user"]['indirizzo']?>>
    </div>
    <div class="mb-3 col-12 col-md-4">
        <label for="telefono" class="form-label">Telefono</label>
        <input type="number" class="form-control" id="telefono" name="telefono" onchange="checkFormUser()"
         value=<?php echo  $_SESSION["user"]['telefono']?>>
    </div>

    <div class="m-0 p-0 col-12 d-none">
        <input type="text" class="form-control" name="save" id="save" value=5 />
    </div>

    <div class="mb-3 col-12">
        <button type="submit" class="btn btn-success" name="submit" id="submit" disabled>Salva</button>
    </div>
  </div>
</form>