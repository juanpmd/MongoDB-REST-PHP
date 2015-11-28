<?php

class Rest2{

	private $contentType="application/json";
	private $apiKey = "?apiKey=4lewqABQU1tuLhgzKoAl7B5-VPzw3Ew0"; //4lewqABQU1tuLhgzKoAl7B5-VPzw3Ew0
	private $baseQuery= 'https://api.mongolab.com/api/1';
	//---------------------------------------------------->>>
	public function getContents( $query ){
		$completeQuery=$this->baseQuery.$query.$this->apiKey;
		$method="GET";
		//Se ajusta la codificacion
		$options = [
				"http" => [
						"method" => $method,
						"header" =>"Content-Type:".$this->contentType."\r\n"

				]
		];
		//Se crea un contexto para hacer la consulta
		$context = stream_context_create ( $options );

		//La variable booleana debe ser falsa para que traiga los datos bien codificados
		$response = file_get_contents ( $completeQuery, false, $context );

		//Se codifica la respuest en un arreglo asociativo
		$response_array = json_decode ( $response, TRUE );
		return $response_array;
	}
	//---------------------------------------------------->>>
	public function postContents( $query, $contentArray ){
		$completeQuery=$this->baseQuery.$query.$this->apiKey;
		$jsonContent=json_encode($contentArray);
		$method="POST";
		//Se ajusta la codificacion
		$options = [
				"http" => [
						"method" => $method,
						"header" =>"Content-Type:".$this->contentType."\r\n".
									"Content-Length:".strlen($jsonContent)."\r\n",
						"content" =>$jsonContent
				]
		];
		//Se crea un contexto para hacer la consulta
		$context = stream_context_create ( $options );

		//La variable booleana debe ser falsa para que traiga los datos bien codificados
		$response = file_get_contents ( $completeQuery, false, $context );

		//Se codifica la respuest en un arreglo asociativo
		$response_array = json_decode ( $response, TRUE );
		return $response_array;
	}
	//---------------------------------------------------->>>
	public function post($url,$post_elements) {
    $data_string=json_encode ( $post_elements );

		//echo "<pre>$data_string</pre>";
    $result = file_get_contents($this->baseQuery.$url.$this->apiKey, null, stream_context_create(array(
    'http' => array(
    'method' => 'PUT',
    'header' => 'Content-Type: application/json' . "\r\n"
    . 'Content-Length: ' . strlen($data_string) . "\r\n",
    'content' => $data_string,
    )
    )));
    //echo "<pre>$result</pre>";
    return $result;
  }
	//---------------------------------------------------->>>
	public function Delete($url,$post_elements) {
    $data_string=json_encode ( $post_elements );

		//echo "<pre>$data_string</pre>";
    $result = file_get_contents($this->baseQuery.$url.$this->apiKey, null, stream_context_create(array(
    'http' => array(
    'method' => 'DELETE',
    'header' => 'Content-Type: application/json' . "\r\n"
    . 'Content-Length: ' . strlen($data_string) . "\r\n",
    'content' => $data_string,
    )
    )));
    //echo "<pre>$result</pre>";
    return $result;
  }
	//---------------------------------------------------->>>
}

?>
