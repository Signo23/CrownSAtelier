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

    /*public function getRandomPosts($n){
        $stmt = $this->db->prepare("SELECT idarticolo, titoloarticolo, imgarticolo FROM articolo ORDER BY RAND() LIMIT ?");
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    

    public function getCategoryById($idcategory){
        $stmt = $this->db->prepare("SELECT nomecategoria FROM categoria WHERE idcategoria=?");
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPosts($n=-1){
        $query = "SELECT idarticolo, titoloarticolo, imgarticolo, anteprimaarticolo, dataarticolo, nome FROM articolo, autore WHERE autore=idautore ORDER BY dataarticolo DESC";
        if($n > 0){
            $query .= " LIMIT ?";
        }
        $stmt = $this->db->prepare($query);
        if($n > 0){
            $stmt->bind_param('i',$n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostById($id){
        $query = "SELECT idarticolo, titoloarticolo, imgarticolo, testoarticolo, dataarticolo, nome FROM articolo, autore WHERE idarticolo=? AND autore=idautore";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    

    public function getAuthors(){
        $query = "SELECT username, nome, GROUP_CONCAT(DISTINCT nomecategoria) as argomenti FROM categoria, articolo, autore, articolo_ha_categoria WHERE idarticolo=articolo AND categoria=idcategoria AND autore=idautore AND attivo=1 GROUP BY username, nome";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
	
	
    }*/
}
?>