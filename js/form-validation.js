function checkFormProduct(){
  let form = new ProductForm(
    document.getElementById("nome").value,
    document.getElementById("price").value,
    document.getElementById("price").value,
    document.getElementById("qnt").value,
    document.getElementById("tag").value,
    ""
  );

  console.log(form);
  document.getElementById("submit").disabled = !form.isReadyForSubmit();
}

function checkFormNewProduct(){
  let form = new ProductForm(
    document.getElementById("nome").value,
    document.getElementById("price").value,
    document.getElementById("price").value,
    document.getElementById("qnt").value,
    document.getElementById("tag").value,
    document.getElementById("formFile").value
  );

  document.getElementById("submit").disabled = !form.isReadyForSubmitForSubmitNewProduct();
  console.log(form);
}

class ProductForm {
  constructor(nome, descrizione, price, qnt, tag, formFile){
    this.nome = nome;
    this.descrizione = descrizione;
    this.price = price;
    this.qnt = qnt;
    this.tag = tag;
    this.formFile = formFile;
  }

  isReadyForSubmit(){
    return this.nome != "" && this.descrizione != "" && this.price != "" && this.qnt != "" && this.tag != "";
  }

  isReadyForSubmitForSubmitNewProduct(){
    return this.isReadyForSubmit() && this.formFile != "";
  }
}