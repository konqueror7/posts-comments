<?php
namespace Glavpunkt;
/**
 *
 */
class ImportComments extends ImportData
{

  public function insertRecord($record) {
    $recordString = "INSERT INTO comments (postId, name, email, body) VALUES (". $record['postId'] . ",'". $record['name'] . "','". $record['email'] ."','" . $record['body'] ."');";
    return $recordString;
  }
}

?>
