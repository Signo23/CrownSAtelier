<form>
  <div class="row">
  <div class="mb-3 col-12 col-md-4">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" value=<?php echo  $_SESSION["user"]['nome']?>>
    </div>
    <div class="mb-3 me-4 col-12 col-md-4">
        <label for="cognome" class="form-label">Cognome</label>
        <input type="text" class="form-control" id="cognome" value=<?php echo  $_SESSION["user"]['cognome']?>>
    </div>
    <div class="mb-3 col-12 col-md-4">
        <label for="telefono" class="form-label">Telefono</label>
        <input type="number" class="form-control" id="telefono" value=<?php echo  $_SESSION["user"]['telefono']?>>
    </div>

    <div class="mb-3 col-12">
        <button type="submit" class="btn btn-success">Salva</button>
    </div>
  </div>
</form>