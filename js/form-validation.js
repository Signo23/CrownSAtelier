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

function checkFormProduct(){
  let form = new ProductForm(
    document.getElementById("nome").value,
    document.getElementById("price").value,
    document.getElementById("price").value,
    document.getElementById("qnt").value,
    document.getElementById("tag").value,
    ""
  );

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
}


class SignClienteForm {
  constructor(nome, cognome, cellulare, email, password){
    this.nome = nome;
    this.cognome = cognome;
    this.cellulare = cellulare;
    this.email = email;
    this.password = password;
  }

  isReadyForSubmit(){
    return this.nome != "" && this.cognome != "" && this.cellulare != "" && validateEmail(this.email)
     && this.password != "";
  }

}

function checkFormSignInCliente(){
  let form = new SignClienteForm(
    document.getElementById("nome").value,
    document.getElementById("cognome").value,
    document.getElementById("cellulare").value,
    document.getElementById("email").value,
    document.getElementById("password").value,
  );

  document.getElementById("submit").disabled = !form.isReadyForSubmit();
}

class SignVenditoreForm {
  constructor(email, password, nomeNegozio, partitaIVA, indirizzo, telefono){
    this.email = email;
    this.password = password;
    this.nomeNegozio = nomeNegozio;
    this.partitaIVA = partitaIVA;
    this.indirizzo = indirizzo;
    this.telefono = telefono;
  }

  isReadyForSubmit(){
    return validateEmail(this.email) && this.password != "" && this.nomeNegozio != "" 
    && this.partitaIVA.length == 11 && this.indirizzo != "" && this.telefono.length == 10;
  }

}

function checkFormSignInFornitore(){
  let form = new SignVenditoreForm(
    document.getElementById("email").value,
    document.getElementById("password").value,
    document.getElementById("nomeNegozio").value,
    document.getElementById("partitaIVA").value,
    document.getElementById("indirizzo").value,
    document.getElementById("telefono").value,
  );

  document.getElementById("submit").disabled = !form.isReadyForSubmit();
}

function validateEmail(input) {
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    return input.match(validRegex);

}

class UserForm {
  constructor(nome, cognome, telefono){
    this.nome = nome;
    this.cognome = cognome;
    this.telefono = telefono;
  }

  isReadyForSubmit(){
    return this.nome != "" && this.cognome != "" && this.telefono.length == 10;
  }
}

function checkFormUser(){
  let form = new UserForm(
    document.getElementById("nome").value,
    document.getElementById("cognome").value,
    document.getElementById("telefono").value,
  );

  document.getElementById("submit").disabled = !form.isReadyForSubmit();

}

class SellerForm {
  constructor(nomeAzienda, indirizzo, telefono){
    this.nomeAzienda = nomeAzienda;
    this.indirizzo = indirizzo;
    this.telefono = telefono;
  }

  isReadyForSubmit(){
    return this.nomeAzienda != "" && this.indirizzo != "" && this.telefono.length == 10;
  }
}

function checkFormSeller(){
  let form = new SellerForm(
    document.getElementById("nomeAzienda").value,
    document.getElementById("indirizzo").value,
    document.getElementById("telefono").value,
  );

  document.getElementById("submit").disabled = !form.isReadyForSubmit();

}