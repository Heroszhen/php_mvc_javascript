<?php
namespace Config;

use Config\Kernel;

abstract class AbstractModel{
    
    protected $pdo;

    public function __construct() {
        $this->pdo = (new Kernel)->getPDO();
    }

    protected function execRequete($req,$params = array()){

		// Sanitize
		if ( !empty($params)){
			foreach($params as $key => $value){
				$params[$key] = trim(strip_tags($value));
			}
		}
		//global $pdo; // globalisation de $pdo

		$r = $this->pdo->prepare($req);
		$r->execute($params);
		if( !empty($r->errorInfo()[2]) ){
			die('Erreur rencontrée lors de la requête : '.$r->errorInfo()[2]);
		}

		return $r;
	}

	protected function persist(string $entity,array $params){
		$req = "INSERT INTO ".$entity ."(";
		$req2 = "VALUES (";
		$index = 0;
		foreach($params as $key=>$value){
			$req .= $key;
			$req2 .= ":".$key;
			if($index < count($params) - 1){
				$req .= ", ";
				$req2 .= ", ";
			}else{
				$req .= ")";
				$req2 .= ")";
			} 	
			$index++;
		}
		$req .= " ".$req2;
		$this->execRequete($req,$params);
		$id = $this->pdo->lastInsertId();
		$req = "select * from ".$entity." where id = :id";
		$one = $this->execRequete($req,["id"=>$id]);
		return $one->fetch();
	}


	protected function findBy(string $entity,array $params){
		$req = "SELECT * FROM ".$entity." where ";
		$index = 0;
		foreach($params as $key=>$value){
			if($index < count($params) - 1){
				$req .= $key." = :".$key." AND ";
			}else{
				$req .= $key." = :".$key;
			} 	
			$index++;
		}
		$result = $this->execRequete($req,$params);
		return $result->fetchAll();
	}

}