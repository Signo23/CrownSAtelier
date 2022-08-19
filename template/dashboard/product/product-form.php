<?php 
    if(isset($_GET['prod'])){
        if($_GET['form']==2){
            $templateParams['prod'] = ($dbh->getProductData($_GET['prod'], $_SESSION['id']))[0];
        } else{
            $templateParams['prod'] = ($dbh->getProductInfo($_GET['prod']))[0];

        }
    }
?>
<form class="row g-3 needs-validation m-2">
    <div class="mb-3 col-12">
        <label for="nome" class="form-label">Nome prodotto</label>
        <input type="text" class="form-control" id="nome" <?php 
        if($_GET['form']==2 || $_GET['form']==3) {
            echo 'disabled ';
        }
        if(isset($_GET['prod'])){
            echo 'value="'. $templateParams['prod']['nome']. "\"";
        }

        ?> required>
    </div>
    <div class="mb-3 me-4 col-12">
        <label for="descrizione" class="form-label">Descrizione</label>
        <textarea class="form-control" id="descrizione" rows="3" <?php 
            if($_GET['form']==2 || $_GET['form']==3) {
                echo 'disabled ';
            }
        ?>  required><?php
        if(isset($_GET['prod'])){
            echo $templateParams['prod']['descrizione'];
        }?></textarea>
    </div>
    <div class="mb-3 col-12 col-md-4">
        <label for="price" class="form-label" aria-label="Amount">Prezzo</label>
        <input type="number" class="form-control" step="0.01" min="0" id="price" <?php
        if(isset($_GET['prod']) && $_GET['form']==2){
            echo 'value='.$templateParams['prod']['prezzo'];
        }?> required>
    </div>
    <div class="mb-3 col-12 col-md-4">
        <label for="qnt" class="form-label">Quantità</label>
        <input type="number" class="form-control" min="0" id="qnt" <?php
        if(isset($_GET['prod']) && $_GET['form']==2){
            echo 'value='.$templateParams['prod']['qntFornita'];
        }?> required>
    </div>

    <div class="mb-3 col-12 col-md-4">
        <label for="tag" class="form-label">Categoria</label>
        <select class="form-select" aria-label="Default select example" id="tag" <?php if($_GET['form']==2 || $_GET['form']==3) {echo 'disabled';}?>  required>
            <option>Seleziona una categoria</option>
            <?php foreach($dbh->getCategories() as $categoria): ?>
                <option <?php
                if(isset($_GET['prod']) &&($categoria['idCategoria']==$templateParams['prod']['categoria'])){
                    echo 'selected';
                }
                ?> value=<?php echo $categoria['idCategoria'].'>'.$categoria['nomeCategoria']; ?>
                </option>
            <?php endforeach;?>
        </select>
    </div>

    <div class="mb-3 col-12 <?php if($_GET['form']!=1) {echo 'd-none';}?>">
        <label for="formFile" class="form-label">Foto prodotto</label>
        <input class="form-control" type="file" accept="image/png, image/jpeg" id="formFile" <?php if($_GET['form']==1) {echo 'required';}?>>
    </div>

    <div class="mb-3 col-12 d-flex justify-content-end align-items-center">
        <button type="submit" class="btn btn-danger m-1 <?php if($_GET['form']==3 || $_GET['form']==1) {echo 'd-none';}?>">Elimina</button>
        <button type="submit" class="btn btn-success m-1">Salva</button>
    </div>
</form>
