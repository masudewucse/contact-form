<?php 
class Contact extends Database{

    public function getAllContacts(){
        $query = $this->connect()->query("SELECT * FROM contact_form");
        return $query->fetchAll();

    }

    public function setContact($post){
        array_pop($post);
        $columns = implode(',', array_keys($post));
        $values = "'".implode("','", array_values($post))."'";

    //$query = $this->connect()->query("INSERT INTO `contact_form` (fullname, email, subject, message) VALUES (?,?,?,?)");
    $statement = $this->connect()->prepare("INSERT INTO `contact_form` ({$columns}) VALUES ({$values})");
   return $statement->execute();
    }

    public function printAll($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

}