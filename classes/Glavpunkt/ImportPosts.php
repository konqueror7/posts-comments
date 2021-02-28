<?php
namespace Glavpunkt;
/**
 *
 */
class ImportPosts extends ImportData
{

  public function insertRecord($record) {
    $recordString = "INSERT INTO posts (userId, title, body) VALUES (". $record['userId'] . ",'". $record['title'] . "','". $record['body'] ."');";
    return $recordString;
  }
}

?>
