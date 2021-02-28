<?php
namespace Glavpunkt;

require 'autoload.php';

$connect = New DataBaseConnect();

$request_posts = New RequestJson('https://jsonplaceholder.typicode.com/posts');
$request_comments = New RequestJson('https://jsonplaceholder.typicode.com/comments');

echo '<pre>';
var_dump($request_comments->dataResponse);
echo '</pre>';

?>
