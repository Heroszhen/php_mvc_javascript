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

	/**
	 * create and update
	 */
	protected function persist(string $entity,array $params, int $id=null){
		if($id == null){
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
		}else{
			$req = "UPDATE ".$entity." SET ";
			$req2 = "WHERE id = :id";
			$index = 0;
			foreach($params as $key=>$value){
				if($key != "id"){
					$req .= $key." = :".$key;
					if($index < count($params) - 1){
						$req .= ", ";
					}
				}
				$index++;
			}
			$req .= " ".$req2;
			$this->execRequete($req,$params);
		}
		
	}


	protected function findBy(string $entity,array $params=[]){
		$req = "SELECT * FROM ".$entity;
		if(count($params) > 0)$req .= " where ";
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

	protected function remove(string $entity,int $id){
		// $req = $req = "DELETE FROM ".$entity." WHERE id = ".$id;
        // $this->pdo->query($req);
		$req = "DELETE FROM ".$entity." WHERE id = ".$id;
        $del = $this->pdo->prepare($req);
        $del->execute();
        return $del->rowCount();
	}

}