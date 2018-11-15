<?php

/**
 * BddManager short summary.
 *
 * BddManager description.
 *
 * @version 1.0
 * @author thoma
 */
class BddManager
{
    private $_db; // Instance de PDO

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }

    public function db(){
        return $this->_db;
    }

    public function add(Marqueur $marqueur) {

        $q = $this->_db->prepare('INSERT INTO marqueurs SET pays = :pays,latitude = :latitude, longitude = :longitude, ville = :ville, info = :info ');

        $q->bindValue(':pays', $marqueur->pays() );
        $q->bindValue(':latitude', $marqueur->latitude());
        $q->bindValue(':longitude', $marqueur->longitude());
        $q->bindValue(':ville', $marqueur->ville());
        $q->bindValue(':info', $marqueur->info());

        $q->execute();
    }

    public function getPays($pays) {
        $marqueur = array();

        $q = $this->_db->query('SELECT * FROM marqueurs WHERE pays LIKE \''.$pays.'\'');
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $marqueur[] = new Marqueur($donnees);
        }
        return $marqueur;
    }

    public function get($id) {

        $id = (int) $id;

        $q = $this->_db->query('SELECT *  FROM marqueurs WHERE id = '.$id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Marqueur($donnees);
    }

    public function getId($id){

        $id = (int) $id;

        $q = $this->_db->query('SELECT EXISTS (SELECT id FROM marqueurs WHERE id="' . $id . '" ) AS id_exist');
        $donnees = $q->fetch();
        if($donnees['id_exist']==true){
            return true;
        }else{
            return false;
        }


    }

    public function countId(){

        $q = $this->_db->query('SELECT COUNT(*) as NB FROM marqueurs ');
        $donnees = $q->fetch();


        return $donnees;

    }

    public function maxId(){

        $q = $this->_db->query('SELECT MAX(id) as NB FROM marqueurs ');
        $donnees = $q->fetch();


        return $donnees;
    }



}