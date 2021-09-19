<?php

class AnnonceManager  {

    //link pour BDD
    private $pdo;

    //construct
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;

    }



    //methode pour ajouter:
    public function add(Annonce $annonce) {

    
    	// préparation de la requête de création
		$add_annonce = $this->pdo->prepare('INSERT INTO advert(
            title, description, postcode, city, price, reservation_message) 
            VALUES (:title, :description, :postcode, :city, :price, :reservation_message)');
		
		// associe et bind - en respectant le price de chacunes
		$add_annonce->bindValue(':title',$annonce->getTitle(), PDO::PARAM_STR);
        $add_annonce->bindValue(':description',$annonce->getDescription(), PDO::PARAM_STR);
		$add_annonce->bindValue(':postcode', $annonce->getPostcode(), PDO::PARAM_INT);
		$add_annonce->bindValue(':city', $annonce->getCity(), PDO::PARAM_STR);
		$add_annonce->bindValue(':price', $annonce->getPrice(), PDO::PARAM_INT);
		$add_annonce->bindValue(':reservation_message', $annonce->getReservation_message(), PDO::PARAM_STR);

        $add_annonce->execute();


        
        $retour = ($add_annonce->rowCount());
        
        $add_annonce->closeCursor();
        return ($retour);
    }


    //methode pour modifier:
    public function update(Annonce $annonce) {
		$update_annonce = $this->pdo->prepare('UPDATE advert
                                                SET title = :title , description = :description, postcode = :postcode, city = :city, price = :price, reservation_message = :reservation_message
                                            WHERE id_advert= '.$annonce->getId_advert());

        $update_annonce->bindValue(':title',$annonce->getTitle(), PDO::PARAM_STR);
        $update_annonce->bindValue(':description',$annonce->getDescription(), PDO::PARAM_STR);
        $update_annonce->bindValue(':postcode', $annonce->getPostcode(), PDO::PARAM_INT);
		$update_annonce->bindValue(':city', $annonce->getCity(), PDO::PARAM_INT);
		$update_annonce->bindValue(':price', $annonce->getPrice(), PDO::PARAM_STR);
		$update_annonce->bindValue(':reservation_message', $annonce->getReservation_message(), PDO::PARAM_INT);

        $update_annonce->execute();


        
        $retour = ($update_annonce->rowCount());
        
        $update_annonce->closeCursor();
        return ($retour);
    }

        // méthode qui retourne la liste des annonces en BDD
        public function getListObjectsAnnonces() {
       
            $list_annonces = $this->pdo->query('SELECT title, category_id, description, postcode, city, price, reservation_message FROM advert');
                                               
            $a=$list_annonces->fetchAll(PDO::FETCH_ASSOC);

            foreach ($a as $annonce){
                $b = new Annonce($annonce);
                $c[] = $b;
            }

            return $c;
    


        }

        public function deleteById($id) {
            $this->pdo->beginTransaction();
            $delete_advert = $this->pdo->query('DELETE FROM advert WHERE id = '.$id);
            $this->pdo->commit();
            return ($delete_advert->rowCount());
        }

        // public function getListAnnonces() {
        //     $list_annonces = $this->pdo->query('SELECT title FROM Annonce;');
        //     return $list_annonces->fetchAll(PDO::FETCH_ASSOC);
        // }

    //methode pour effacer:
    public function delete() {}


    //methode pour retourner:
    public function list() {}




    // private $annonce;

    // public function getannonce() { return $this->annonce; }

    // public function setannonce($annonce) { $this->annonce = $annonce; }

    
}