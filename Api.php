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
		$db->insertData2("datos", $data["name"], $data["lastname"], $data["email"], $data["age"], $data["student"]);
    $this->response('',200);
  }
  //-------------------------->>>
  private function DeleteFile() {
    if ($this->get_request_method () != "POST") {
			$this->response ( '', 406 );
		}
		$db = new DB();
    $data = json_decode(file_get_contents('php://input'),true);
		$db->Delete_Data("datos", $data["id"]);
    $this->response('',200);
  }
  //-------------------------->>>
  private function UpdateFile() {
    if ($this->get_request_method () != "POST") {
			$this->response ( '', 406 );
		}
		$db = new DB();
    $data = json_decode(file_get_contents('php://input'),true);
		$db->Update_Data2("datos", $data["name"], $data["lastname"], $data["email"], $data["age"], $data["student"], $data["id"]);
    $this->response('',200);

    //$valores2= array('$set'=>array("name"=>"Jorge", "lastname"=>"Rincon", "email"=>"lufe089@gmail.com", "age"=>25, "student"=>"true"));
    //$valorupdate = $db->Update_Data("datos",$valores2, "5658c061e4b09df266618703");
  }
  //-------------------------->>>

}
$api = new WebAPI();
$api->processApi();
?>
