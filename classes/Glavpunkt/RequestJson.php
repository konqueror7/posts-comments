<?php
namespace Glavpunkt;

class RequestJson
{
  private $url;

  function __construct($url) {
    $this->url = $url;
  }

  private function crequest($url) {
    $crequest = curl_init($url);
    curl_setopt($crequest, CURLOPT_HEADER, 0);
    curl_setopt($crequest, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($crequest, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($crequest, CURLOPT_VERBOSE, 0);
    curl_setopt($crequest, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($crequest);
    curl_close($crequest);

    return $response;
  }

  private function responseDecode($response)
  {
    $dataResponseArrObj = (array) \json_decode($response);

    $ObjToArr = function($val) {
      $val = (array) $val;
      return $val;
    };
    
    $dataResponse = array_map($ObjToArr, $dataResponseArrObj);
    return $dataResponse;
  }


  public function __get($property)
  {
    switch ($property) {
      case 'dataResponse':
          return $this->responseDecode($this->crequest($this->url));
          break;
    }
  }

}
?>
