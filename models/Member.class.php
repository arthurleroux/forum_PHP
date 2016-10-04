<?php

class Member {
    // les attributs (les memes que dans la BDD)
    private $id;
    private $pseudo;
    private $password;
    private $birthdate;
    private $inscription_date;
    private $is_admin;
    
    //constructeur
    //on peut instancier un objet existant en lui passant l'id
    //ou en créer un nouveau
    public function __construct($id=''){
        if ($id != ''){
            $this->id = $id;
            $this->load();
        }
    }

    //getters et setters
    public function getId() {
        return $this->id;
    }
    public function getPseudo(){
        return $this->pseudo;
    }
    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function getBirthdate(){
        return $this->birthdate;
    }
    public function setBirthdate($birthdate){
        $this->birthdate = $birthdate;
    }
    public function getInscriptionDate(){
        return $this->inscription_date;
    }
    public function setInscriptionDate($inscription_date){
        $this->inscription_date = $inscription_date;
    }
    public function getIsAdmin(){
        return $this->is_admin;
    }
    public function setIsAdmin($is_admin){
        $this->is_admin = $is_admin;
    }
    
    //fonction load, pour récupérer depuis la BDD
    public function load() {
        if (isset($this->id)){
            $bdd = Database::getInstance();
            $sql = 'SELECT id, pseudo, password, birthdate, inscription_date, is_admin
                    FROM member
                    WHERE id = '.$this->id;
            //si il y a un résultat
            if ($result = $bdd->fetch($sql)){
                //on remplit l'objet (= on l'hydrate)
                $this->pseudo = $result[0]['pseudo'];
                $this->password = $result[0]['password'];
                $this->birthdate = $result[0]['birthdate'];
                $this->inscription_date = $result[0]['inscription_date'];
                $this->is_admin = $result[0]['is_admin'];
                // ça a fonctionné
                return true;
            }
            // ça n'a pas fonctionné
            return false;
        }
    }
    
    public function insert(){

        // on vérifie que ce pseudo n'est pas déja en bdd
        $bdd = Database::getInstance();  
        $sql = 'SELECT * FROM member WHERE pseudo LIKE "'.$this->pseudo.'"';
        $results = $bdd->fetch($sql);
        // si c'est bon, on insère
        if (sizeof($results) == 0){
            $sql = 'INSERT INTO member (pseudo, password, birthdate, inscription_date, is_admin)
                VALUES ("'.$this->pseudo.'", "'.$this->password.'", "'.$this->birthdate.'", NOW(), 0)';
            $bdd->exec($sql);
            return true;
        }
        else {
            return false;
        }
    }

    public function edit() {
        $bdd = Database::getInstance();
        $sql = 'SELECT id, is_admin
                    FROM member
                    WHERE id = '.$this->id;
        $results = $bdd->fetch($sql);
        if (sizeof($results) == 1) {
            $sql = 'UPDATE member
                    SET is_admin = "'.$this->is_admin.'"
                    WHERE id = '.$this->id;;
            $bdd->exec($sql);
            return true;
        }
        else {
            return false;
        }
    }

    public function delete() {
        if (isset($this->id)) {
            $bdd = Database::getInstance();
            $sql = 'DELETE FROM member
                    WHERE id = '.$this->id;
            if ($result = $bdd->fetch($sql)) {
                return true;
            }
            else {
                return false;
            }
        }
    }

    public function login(){
        // on regarde si ce membre avec ce pseudo et ce password existent en bdd
        $bdd = Database::getInstance();  
        $sql = 'SELECT id, pseudo, is_admin FROM member WHERE pseudo LIKE "'.$this->pseudo.'" AND password LIKE "'.$this->password.'"';
        $results = $bdd->fetch($sql);
        // si c'est bon, on le connecte avec une session
        if (sizeof($results) > 0){
            $_SESSION['pseudo'] = $results[0]['pseudo'];
            $_SESSION['id'] = $results[0]['id'];
            $_SESSION['is_admin'] = $results[0]['is_admin'];
            return true;
        }
        else {
            return false;
        }
    }

    public static function getAll(){
        $bdd = Database::getInstance();
        $sql = 'SELECT id, pseudo, password, birthdate, inscription_date, is_admin FROM member';
        
        $elements = array();
        if ($results = $bdd->fetch($sql)){
            foreach ($results as $result){
                $item = new Member();
                $item->id = $result['id'];
                $item->pseudo = $result['pseudo'];
                $item->password = $result['password'];
                $item->birthdate = $result['birthdate'];
                $item->inscription_date = $result['inscription_date'];
                $item->is_admin = $result['is_admin'];
                array_push($elements, $item);
            }
        }
        return $elements;
    }
    
}

