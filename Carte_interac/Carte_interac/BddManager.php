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

        $q = $this->_db->prepare('INSERT INTO marqueurs SET pays = :pays,latitude = :latitude, longitude = :longitude, ville = :ville, info = :info ,domaine =:domaine ,departement = :departement,annee = :titre, etablissement :etablissement');

        $q->bindValue(':pays', $marqueur->pays() );
        $q->bindValue(':latitude', $marqueur->latitude());
        $q->bindValue(':longitude', $marqueur->longitude());
        $q->bindValue(':ville', $marqueur->ville());
        $q->bindValue(':info', $marqueur->info());

        $q->bindValue(':domaine', $marqueur->domaine());
        $q->bindValue(':departement', $marqueur->departement());
        $q->bindValue(':annee', $marqueur->annee());
        $q->bindValue(':etablissement', $marqueur->etablissement());




        $q->execute();
    }
/*
    public function getPays($pays) {
        $marqueur = array();

        $q = $this->_db->query('SELECT * FROM marqueurs WHERE pays LIKE \''.$pays.'\'');
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $marqueur[] = new Marqueur($donnees);
        }
        return $marqueur;
    }


    public function getPays($pays) {
        $pays = (string) $pays;

        $q = $this->_db->query('SELECT * FROM marqueurs WHERE pays LIKE \''.$pays.'\'');
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        return new Marqueur($donnees);
    }
     */


    public function getPays($pays) {
        $pays = (string) $pays;

        $q = $this->_db->query('SELECT * FROM marqueurs WHERE pays LIKE \''.$pays.'\'');
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        return new Marqueur($donnees);


    }


    public function get($idM) {

        $idM = (int) $idM;

        $q = $this->_db->query('SELECT *  FROM marqueurs WHERE idM = '.$idM);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Marqueur($donnees);
    }

    public function getidM($idM){

        $idM = (int) $idM;

        $q = $this->_db->query('SELECT EXISTS (SELECT idM FROM marqueurs WHERE idM="' . $idM . '" ) AS idM_exist');
        $donnees = $q->fetch();
        if($donnees['idM_exist']==true){
            return true;
        }else{
            return false;
        }


    }


    public function countNbPaysIdentique($pays){

        $q = $this->_db->query('SELECT COUNT(*) as NB FROM marqueurs where pays LIKE \''.$pays.'\'');
        $donnees = $q->fetch();


        return $donnees;


    }


    public function countidM(){

        $q = $this->_db->query('SELECT COUNT(*) as NB FROM marqueurs ');
        $donnees = $q->fetch();


        return $donnees;

    }

    public function maxidM(){

        $q = $this->_db->query('SELECT MAX(idM) as NB FROM marqueurs ');
        $donnees = $q->fetch();


        return $donnees;
    }



}