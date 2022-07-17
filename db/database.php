<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }        
    }

    public function getCategories(){
        $stmt = $this->db->prepare("SELECT * FROM categorie");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductByCategory($idcategory){
        $query = "SELECT * 
        FROM prodotti, prodotti_forniti 
        WHERE prodotti.idProdotto = prodotti_forniti.idProdotto 
        AND prodotti.categoria = ?
        AND prodotti_forniti.prezzo IN ( SELECT min(p.prezzo) 
                                            FROM prodotti_forniti p 
                                            GROUP BY p.idProdotto )";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductData($id, $seller){
        $query = "SELECT * 
        FROM prodotti, prodotti_forniti 
        WHERE prodotti.idProdotto = prodotti_forniti.idProdotto 
        AND prodotti_forniti.idProdotto = ? 
        AND prodotti_forniti.idFornitore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$id, $seller);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSellerByProductId($id){
        $query = "SELECT * 
        FROM utenti, prodotti_forniti 
        WHERE utenti.idUtente = prodotti_forniti.idFornitore 
        AND prodotti_forniti.idProdotto = ?
        AND utenti.tipo = 'fornitore' 
        ORDER BY prodotti_forniti.prezzo";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkLogin($email, $password){
        $query = "SELECT * FROM utenti WHERE email = ? AND password = ?";
        $cryptedPw = crypt($password, '$6$rounds=5000$usesomesillystringforsalt$');
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$email, $cryptedPw);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function signinFornitore($email, $password, $telefono, $nome, $via){
        $cryptedPw = crypt($password, '$6$rounds=5000$usesomesillystringforsalt$');
        $query = "INSERT INTO utenti (email, password, telefono, nomeAzienda, indirizzo, tipo) VALUES (?,?,?,?,?,'fornitore')";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssss',$email, $cryptedPw, $telefono, $nome, $via) ;
        
        $stmt->execute();

        return $stmt->insert_id;
    }

    public function signinCliente($email, $password, $telefono, $nome, $cognome){
        $cryptedPw = crypt($password, '$6$rounds=5000$usesomesillystringforsalt$');
        $query = "INSERT INTO utenti (email, password, telefono, nome, cognome, tipo) VALUES (?,?,?,?,?,'cliente')";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssss',$email, $cryptedPw, $telefono, $nome, $cognome) ;
        
        $stmt->execute();

        return $stmt->insert_id;
    }

    public function addToCart($userPkid, $productPkid, $sellerPkid){
        $query = "INSERT INTO carrelli (idCliente, idProdotto, idFornitore, qnt) VALUES (?,?,?,1)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iii', $userPkid, $productPkid, $sellerPkid);
        debug_to_console("Query da eseguire");
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function getProductInCart(int $userPkid, int $productPkid, int $sellerPkid){
        $query = "SELECT * FROM carrelli WHERE idCliente = ? AND idProdotto = ? AND idFornitore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iii', $userPkid, $productPkid, $sellerPkid);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateCart($userPkid, $productPkid, $sellerPkid, $qnt) {
        $query = "UPDATE carrelli SET qnt = ? WHERE idCliente = ? AND idProdotto = ? AND idFornitore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iiii', $qnt, $userPkid, $productPkid, $sellerPkid);
        debug_to_console("Query da eseguire");
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function numberOfItemInCart($userPkid) {
        $query = "SELECT SUM(qnt) as sumQnt FROM carrelli WHERE idCliente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userPkid);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0]['sumQnt'];
        return $result == null ? 0 : $result;
    }

    public function cartTotal($userPkid) {
        $query = "SELECT SUM(prodotti_forniti.prezzo) AS totale
        FROM carrelli 
        LEFT JOIN prodotti_forniti 
        ON carrelli.idFornitore = prodotti_forniti.idFornitore
        AND carrelli.idProdotto = prodotti_forniti.idProdotto
        WHERE carrelli.idCliente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userPkid);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0]['totale'];
        return round($result, 2, PHP_ROUND_HALF_DOWN);
    }

    public function cartItems($userPkid) {
        $query = "SELECT prodotti_forniti.prezzo, prodotti.nome, prodotti.descrizione, prodotti.imgURL, carrelli.qnt 
        FROM carrelli
        LEFT JOIN prodotti_forniti 
        ON carrelli.idFornitore = prodotti_forniti.idFornitore
        AND carrelli.idProdotto = prodotti_forniti.idProdotto
        LEFT JOIN prodotti 
        ON carrelli.idProdotto = prodotti.idProdotto
        WHERE carrelli.idCliente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userPkid);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function placeOrder($userPkid){
    }

    //############################################################################
    //############################################################################
    //##                                                                        ##
    //##                           NOTIFICATION                                 ##
    //##                                                                        ##
    //############################################################################
    //############################################################################
    public function notifyOrderShipped(){};
    public function notifyAddItemInOrder(){};
    public function numberOfNotication(){};
}
?>