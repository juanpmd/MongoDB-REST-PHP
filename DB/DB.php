<?php

/* Se puede ver documentacion de la API en: http://docs.mongolab.com/data-api/ */
require_once 'Rest.php';

class DB {

	private $restObj;
	private $db_name = 'bdweb';

	function __construct(){
		$this->restObj= new Rest2();
	}
	//--------------------------------------------------
	public function getDatabases(){
		$query="/databases";
		$response=$this->restObj->getContents($query);
		return $response;
	}
	//--------------------------------------------------
	public function getDocumentos($collection){
		$query="/databases/".$this->db_name."/collections/".$collection;
		$response=$this->restObj->getContents($query);
		return $response;
	}
	//--------------------------------------------------
	public function insertData($collection, $contentArray){
		$query="/databases/".$this->db_name."/collections/".$collection;
		 $insertedValue=$this->restObj->postContents($query, $contentArray);
		 return $insertedValue;

	}
	//--------------------------------------------------
	public function insertData2($collection, $name, $lastname, $email, $age, $student){
		$contentArray = array("name"=>$name, "lastname"=>$lastname, "email"=>$email, "age"=>$age, "student"=>$student);

		$query="/databases/".$this->db_name."/collections/".$collection;
		 $insertedValue=$this->restObj->postContents($query, $contentArray);
		 return $insertedValue;

	}
	//--------------------------------------------------
	public function Update_Data($collection, $contentArray, $id){
		$query="/databases/".$this->db_name."/collections/".$collection."/".$id;
		 $insertedValue=$this->restObj->post($query, $contentArray);
		 return $insertedValue;

	}
	//--------------------------------------------------
	public function Delete_Data($collection, $id){
		$query="/databases/".$this->db_name."/collections/".$collection."/".$id;
		$contentArray =array("async"=> "true");
		 $insertedValue=$this->restObj->delete($query, $contentArray);
		 return $insertedValue;

	}
	//--------------------------------------------------
	/* Metodo para cuando se tenga conexion a la base de datos */
	// Abrir conexion - Solo cuando se usa el driver
	protected function open_connection() {
		try {
			//Complete string mongodb://'articles':'articles'@ds027759.mongolab.com:27759/literaturereview
			$this->conn = new MongoClient ( "mongodb://" .
					self::$db_user . ":" .self::$db_pass . "@ds027759.mongolab.com:27759/" .
					self::$db_name );
		} catch ( Exception $e ) {
			$error_text = 'Date:' . time () . ' Connection error text: ' . $e->message;
			echo $error_text;
			return false;
		}
	}
	//--------------------------------------------------
	public function create($collection, $valuesArray) {
		$collectionSelected = $this->conn->selectCollection (self::$db_name, $collection );
		$result = $collectionSelected->insert( $valuesArray );
		return $result;
	}
	//--------------------------------------------------
}
?>
