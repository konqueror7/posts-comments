<?php
namespace Glavpunkt;
abstract class ImportData
{
  abstract function insertRecord($record);

  public function importArr($arr, $db) {

    $sql = '';
    $currentrecord = 0;
    $i = 0;
    $recordingbatch = 13;
    $request_posts_arr = $arr->dataResponse;
    // var_dump($request_posts_arr);
    // $endrecord = 29;
    $endrecord = count($request_posts_arr) - 1;

    do {
      if (($endrecord - $currentrecord) == 0) {
        $recordingbatch = 1;
      } else if (($endrecord - $currentrecord) > 0 && ($endrecord - $currentrecord) < $recordingbatch) {
        echo '<br> Difference - '.($endrecord - $currentrecord).'<br>';
        $recordingbatch = $endrecord - $currentrecord;
      }
      // if (($endrecord - $currentrecord) < $recordingbatch) {
      //   echo '<br> Difference - '.($endrecord - $currentrecord).'<br>';
      //   $recordingbatch = $endrecord - $currentrecord;
      // } else {
      //   $recordingbatch = 10;
      // }

      $sql = '';
      // echo '<br> currentrecord before - '.$currentrecord.'<br>';
      for ($i = $currentrecord; $i < $currentrecord + $recordingbatch; $i++) {
        $item = $request_posts_arr[$i];
        // echo '<br> Key in Array - '.$i.'<br>';
        // echo $this->insertRecord($item).'<br>';
        $sql .= $this->insertRecord($item);
      }

      if (!$db->connect->multi_query($sql)) {
          echo "Не удалось выполнить мультизапрос: (" . $db->connect->errno . ") " . $db->connect->error;
      } else {
        // $db->connect->free();
        while($db->connect->next_result()) $db->connect->store_result();
        echo 'Current Batch recorded!'. $db->connect->info .'<br>';
        echo '<br> insert_id - '.$db->connect->insert_id.'<br>';
        // $db->connect->mysql_free_result($queryres);
      }



      $currentrecord = $i;
      // echo '<br> currentrecord after - '.$currentrecord.'<br>';

    } while ($currentrecord <= $endrecord);

    return count($request_posts_arr);
  }
}

?>
