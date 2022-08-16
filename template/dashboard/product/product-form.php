<form class="row g-3 needs-validation m-2">
    <div class="mb-3 col-12">
        <label for="nome" class="form-label">Nome prodotto</label>
        <input type="text" class="form-control" id="nome" required>
    </div>
    <div class="mb-3 me-4 col-12">
        <label for="descrizione" class="form-label">Descrizione</label>
        <textarea class="form-control" id="descrizione" rows="3" required></textarea>
    </div>
    <div class="mb-3 col-12 col-md-4">
        <label for="price" class="form-label" aria-label="Amount">Prezzo</label>
        <input type="number" class="form-control" step="0.01" min="0" id="price" required>
    </div>
    <div class="mb-3 col-12 col-md-4">
        <label for="qnt" class="form-label">Quantità</label>
        <input type="number" class="form-control" min="0" id="qnt required">
    </div>

    <div class="mb-3 col-12 col-md-4">
        <label for="tag" class="form-label">Categoria</label>
        <select class="form-select" aria-label="Default select example" id="tag" required>
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </div>

    <div class="mb-3 col-12">
        <label for="formFile" class="form-label">Default file input example</label>
        <input class="form-control" type="file" id="formFile" required>
    </div>

    <div class="mb-3 col-12 d-flex justify-content-end align-items-center">
        <button type="submit" class="btn btn-danger m-1 <?php if($_GET['form']==3 || $_GET['form']==1) {echo 'd-none';}?>">Elimina</button>
        <button type="submit" class="btn btn-success m-1">Salva</button>
    </div>
</form>