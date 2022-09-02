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

    public function getUserInfo($pkid){
        $query = "SELECT *
        FROM utenti
        WHERE idUtente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$pkid);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    public function getProductByCategory($idcategory){
        $query = "SELECT * 
        FROM prodotti, prodotti_forniti INNER JOIN(
			SELECT idProdotto, MIN(prezzo) minPrezzo
            FROM prodotti_forniti
            GROUP BY idProdotto
        ) p ON prodotti_forniti.idProdotto = p.idProdotto
        WHERE prodotti.idProdotto = prodotti_forniti.idProdotto 
        AND prodotti.categoria = ?
        AND prodotti_forniti.prezzo = p.minPrezzo
        AND prodotti_forniti.qntFornita > 0";
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

    public function getProductInfo($id){
        $query = "SELECT * 
        FROM prodotti
        WHERE prodotti.idProdotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
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
        AND prodotti_forniti.qntFornita > 0 
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
        $query = "SELECT carrelli.qnt, prodotti_forniti.prezzo
        FROM carrelli 
        LEFT JOIN prodotti_forniti 
        ON carrelli.idFornitore = prodotti_forniti.idFornitore
        AND carrelli.idProdotto = prodotti_forniti.idProdotto
        WHERE carrelli.idCliente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userPkid);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $sum = 0;
        foreach ($result as $res) {
            $sum += ($res['qnt'] * $res['prezzo']);
        }
        return round($sum, 2, PHP_ROUND_HALF_DOWN);
    }

    public function cartItems($userPkid) {
        $query = "SELECT * 
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

    public function removeFromCart($userPkid, $sellerPkid, $productPkid){
        $query = "DELETE FROM carrelli 
        WHERE idCliente = ? 
        AND idFornitore = ? 
        AND idProdotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iii', $userPkid, $sellerPkid, $productPkid);
        $stmt->execute();
        var_dump($stmt->error);
        return true;
    }

    public function search($search) {
        $query = "SELECT * 
        FROM prodotti, prodotti_forniti 
        WHERE prodotti.idProdotto = prodotti_forniti.idProdotto 
        AND prodotti_forniti.prezzo IN ( SELECT min(p.prezzo) 
                                            FROM prodotti_forniti p 
                                            GROUP BY p.idProdotto )
        AND ((prodotti.nome LIKE '%".$search."%')
        OR (prodotti.descrizione LIKE '%".$search."%'))";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductForSeller($sellerPkid) {
        $query = "SELECT * 
        FROM prodotti, prodotti_forniti 
        WHERE prodotti.idProdotto = prodotti_forniti.idProdotto 
        AND prodotti_forniti.idFornitore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $sellerPkid);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductNotForSeller($sellerPkid) {
        $query = "SELECT prodotti.*
        FROM prodotti, prodotti_forniti 
        WHERE prodotti.idProdotto NOT IN (SELECT p.idProdotto
                                                FROM prodotti_forniti p
                                                WHERE p.idFornitore = ?)
        GROUP BY prodotti.idProdotto
        ORDER BY prodotti.idProdotto";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $sellerPkid);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    //############################################################################
    //############################################################################
    //##                                                                        ##
    //##                           NOTIFICATION                                 ##
    //##                                                                        ##
    //############################################################################
    //############################################################################
    public function notifyOrderShipped($pkidUser){
        $query = "INSERT INTO ricezioni_cliente (idCliente, tipo, data) 
        VALUES (?, 'ORDINE_SPE', NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $pkidUser);
        $stmt->execute();
        return $stmt->insert_id;
    }
    public function notifyAddItemInOrder($item){
        $query = "INSERT INTO ricezioni_fornitori (idFornitore, tipo, data) 
        VALUES (?, 'ORDINE_RIC', NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $item['idFornitore']);
        $stmt->execute();
        return $stmt->insert_id;
    }
    public function notificationForSeller($pkid, $number){
        $query = "SELECT *
        FROM ricezioni_fornitori 
        LEFT JOIN notifiche ON ricezioni_fornitori.tipo = notifiche.tipo
        WHERE ricezioni_fornitori.idFornitore = ?
        ORDER BY ricezioni_fornitori.data DESC";
        if($number > 0) {
            $query." LIMIT ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ii', $pkid, $number);
        } else {
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i', $pkid);
        }
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    public function notificationForUser($pkid, $number){
        $query = "SELECT *
        FROM ricezioni_cliente 
        LEFT JOIN notifiche ON ricezioni_cliente.tipo = notifiche.tipo
        WHERE ricezioni_cliente.idCliente = ?
        ORDER BY ricezioni_cliente.data DESC";
        if($number > 0) {
            $query." LIMIT ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ii', $pkid, $number);
        } else {
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i', $pkid);
        }
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function notifyNoItem($pkisSeller){
        $query = "INSERT INTO ricezioni_fornitori (idFornitore, tipo, data) 
        VALUES (?, 'OUT_OF_ST', NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $pkisSeller);
        $stmt->execute();
        return $stmt->insert_id;
    }

    //############################################################################
    //############################################################################
    //##                                                                        ##
    //##                         ITEM MANIPULATION                              ##
    //##                                                                        ##
    //############################################################################
    //############################################################################
    
    public function addItemForSeller($pkidSeller, $pkidProduct, $price, $qnt){
        $query = "INSERT INTO prodotti_forniti (idFornitore, idProdotto, prezzo, qntFornita)
        VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iidi', $pkidSeller, $pkidProduct, $price, $qnt);
        $stmt->execute();
        return $stmt->insert_id;
    }
    public function editItemForSeller($pkidSeller, $pkidProduct, $price, $qnt){
        $query = "UPDATE prodotti_forniti
        SET qntFornita = ?, prezzo = ?
        WHERE idFornitore = ? 
        AND idProdotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('idii', $qnt, $price, $pkidSeller, $pkidProduct);
        $stmt->execute();
        return $stmt->insert_id;
    }
    public function addNewProduct($name, $descr, $img, $idcategory){
        $query = "INSERT INTO prodotti (nome, descrizione, imgURL, categoria) 
        VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $URL = $this->getCategoryDir($idcategory) . $img;
        $stmt->bind_param('sssi', $name, $descr, $URL, $idcategory);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function getCategoryDir($id){
        switch($id){
            case 1:
                return DIR_CORONE;
            case 2:
                return DIR_VESTITI;
            case 3:
                return DIR_FESTONI;
            case 4:
                return DIR_BOUQUET;
        }

    }

    public function reduceQntItemSeller($pkidSeller, $pkidItem) {
        $query = "UPDATE prodotti_forniti 
        SET qntFornita = qntFornita - 1 
        WHERE idFornitore = ? 
        AND idProdotto = ?
        AND qntFornita != 0";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $pkidSeller, $pkidItem);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function checkNotifyOutOfStockItem($pkidSeller, $pkidItem){
        $query = "SELECT *
        FROM prodotti_forniti
        WHERE idFornitore = ?
        AND idProdotto = ?
        AND qntFornita = 0";
        $stmt = $this->db->prepare(($query));
        $stmt->bind_param('ii', $pkidSeller, $pkidItem);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if(count($result) != 0 ){
            $this->notifyNoItem($pkidSeller);
        }
    }

    //############################################################################
    //############################################################################
    //##                                                                        ##
    //##                                ORDERS                                  ##
    //##                                                                        ##
    //############################################################################
    //############################################################################

    public function orderForUser($pkid) {
        $query="SELECT * 
        FROM ordini
        LEFT JOIN liste_prodotti_ordine
        ON liste_prodotti_ordine.nOrdine = ordini.nOrdine
        LEFT JOIN prodotti
        ON prodotti.idProdotto = liste_prodotti_ordine.idProdotto
        WHERE ordini.idCliente = ?
        AND liste_prodotti_ordine.nOrdine IS NOT NULL
        ORDER BY liste_prodotti_ordine.nOrdine DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $pkid);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function orderForSeller($pkid) {
        $query="SELECT * 
        FROM ordini
        LEFT JOIN liste_prodotti_ordine
        ON liste_prodotti_ordine.nOrdine = ordini.nOrdine
        LEFT JOIN prodotti
        ON prodotti.idProdotto = liste_prodotti_ordine.idProdotto
        WHERE liste_prodotti_ordine.idFornitore = ?
        AND liste_prodotti_ordine.nOrdine IS NOT NULL
        ORDER BY liste_prodotti_ordine.nOrdine DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $pkid);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function placeOrder($userPkid){
        $nOrder = $this->newOrder($userPkid);
        $items = $this->cartItems($userPkid);
        foreach ($items as $item) {
            if($item['qntFornita'] >= $item['qnt']){
                $this->addItemToOrder($item, $nOrder);
                $this->notifyAddItemInOrder($item); 
                $this->reduceQntItemSeller($item['idFornitore'], $item['idProdotto']);
                $this->checkNotifyOutOfStockItem($item['idFornitore'], $item['idProdotto']);
            }
        }
        $this->clearCart($userPkid);
    }

    private function newOrder($userPkid) {
        $query = "INSERT INTO ordini (dataRichiesta, stato, idCliente) 
        VALUES (NOW(),'Ordine effettuato', ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userPkid);
        $stmt->execute();
        return $stmt->insert_id;
    }

    private function addItemToOrder($item, $nOrder) {
        $query = "INSERT INTO liste_prodotti_ordine (nOrdine, idProdotto, idFornitore, qnt)
        VALUES (?, ? ,? ,? )";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iiii',$nOrder, $item['idProdotto'] , $item['idFornitore'], $item['qnt']);
        $stmt->execute();
        return $stmt->insert_id;
    }

    private function clearCart($userPkid) {
        $query = "DELETE FROM carrelli WHERE idCliente = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $userPkid);
        $stmt->execute();
        return true;
    }

    public function sendItemOfOrder($nOrder, $sellerPkid, $itemPkid){
        $query = "UPDATE liste_prodotti_ordine
        SET spedito = '1' 
        WHERE nOrdine = ? 
        AND idProdotto = ? 
        AND idFornitore = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iii', $nOrder, $itemPkid, $sellerPkid);
        $stmt->execute();
        $result = $stmt->insert_id;

        $query = "SELECT *
        FROM ordini
        WHERE nOrdine = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $nOrder);
        $stmt->execute();
        $order = $stmt->get_result()->fetch_all(MYSQLI_ASSOC)[0];

        $this->notifyOrderShipped($order['idCliente']);

        return $result;
    }
    //############################################################################
    //############################################################################
    //##                                                                        ##
    //##                                USERS                                   ##
    //##                                                                        ##
    //############################################################################
    //############################################################################
    public function updateUser($pkid, $name, $surname, $phone){
        $query = "UPDATE utenti 
        SET telefono = ?, nome = ?, cognome = ? 
        WHERE idUtente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssi', $phone, $name, $surname, $pkid);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function updateSeller($pkid, $name, $address, $phone){
        $query = "UPDATE utenti 
        SET telefono = ?, nomeAzienda = ?, indirizzo = ? 
        WHERE idUtente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssi', $phone, $name, $address, $pkid);
        $stmt->execute();
        return $stmt->insert_id;
    }
}
?>