<?php
  require_once 'DB/DB.php';
  require_once 'Controllers/RestApi.php';

class WebAPI extends REST {
  //-------------------------->>>
  public function processApi() {
    $func = strtolower (trim (str_replace ( "/", "", $_REQUEST ['val'])));
    if (( int ) method_exists ($this, $func) > 0)
      $this->$func ();
    else
      $this->response ( '', 404 );
  }
  //-------------------------->>>
  private function json($data) {
		if (is_array ( $data )) {
			return json_encode ( $data );
		}
	}
  //----------------------------->>>
  private function allFiles() {
      if ($this->get_request_method () != "GET") {
  			$this->response ( '', 406 );
  		}
  		$db = new DB();
  		$result = $db->getDocumentos("datos");

  		if(!empty($result)){
  			$jsonVar = $this->json($result);
        $this->response($jsonVar, 200);
  		} else {
        $this->response('',204);
      }
  }
  //-------------------------->>>
  private function AddFile() {
    if ($this->get_request_method () != "POST") {
			$this->response ( '', 406 );
		}
		$db = new DB();
    $data = json_decode(file_get_contents('php://input'),true);
    //$valores = array('$set'=>array("name"=>$data["name"], "lastname"=>$data["lastname"], "email"=>$data["email"], "age"=>$data["age"], "student"=>$data["student"]));
    //$valores = array('$set'=>array("name"=>"Daniela", "lastname"=>"Gonzalez", "email"=>"danigonz@gmail.com", "age"=>24, "student"=>"true"));

		$db->insertData2("datos", $data["name"], $data["lastname"], $data["email"], $data["age"], $data["student"]);
    $this->response('',200);
  }
  //-------------------------->>>

}
$api = new WebAPI();
$api->processApi();
?>
