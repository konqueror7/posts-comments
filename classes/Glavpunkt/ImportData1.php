<?php
namespace Glavpunkt;
abstract class ImportData
{
  abstract function insertRecord($record);

  public function importArr($arr, $db) {
    $sql = '';
    $currentrecord = 0;
    $i = 0;
    $request_posts_arr = $arr->dataResponse;
    // var_dump($request_posts_arr);
    // $endrecord = 29;
    $endrecord = count($request_posts_arr) - 1;
    $recordingbatch = 10;
    do {
      $sql = '';
      echo '<br> currentrecord - '.$currentrecord.'<br>';
      for ($i = $currentrecord; $i < $currentrecord + $recordingbatch; $i++) {
        $item = $request_posts_arr[$i];
        echo '<br>'.$i.'<br>';
        echo $this->insertRecord($item).'<br>';
        $sql .= $this->insertRecord($item);
      }

      if (!$db->connect->multi_query($sql)) {
          echo "Не удалось выполнить мультизапрос: (" . $db->connect->errno . ") " . $db->connect->error;
      } else {
        while($db->connect->next_result()) $db->connect->store_result();
        echo 'Current Batch recorded!'.'<br>';
      }

      if (($endrecord - $currentrecord) < $recordingbatch) {
        $recordingbatch = $endrecord - $currentrecord;
      }

      $currentrecord = $i;

    } while ($currentrecord < $endrecord);

    return count($request_posts_arr);
  }
}

?>
