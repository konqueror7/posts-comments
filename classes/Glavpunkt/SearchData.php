<?php
namespace Glavpunkt;

class SearchData
{
  public function dbquery($strquery, $db) {
    if ($db->connect->connect_errno) {
      return 'Alert! Not connection with DataBase!';
    } elseif ($db->connect->host_info) {
      $result = $db->connect->query("SELECT posts.`title` as `post_title`, comments.`body` FROM comments INNER JOIN posts ON (comments.`postId`=posts.`id`) WHERE comments.body LIKE '%".$strquery."%'");
      return $this->resultToArray($result);
    }
  }
  function resultToArray($result) {
    $resultArr = array();
    while (($row = $result->fetch_assoc()) != false) {$resultArr[] = $row;}
    return $resultArr;
  }

}
