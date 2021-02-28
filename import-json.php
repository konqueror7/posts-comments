<?php
namespace Glavpunkt;

require 'autoload.php';

$db = New DataBaseConnect();

$request_posts = New RequestJson('https://jsonplaceholder.typicode.com/posts');
$request_comments = New RequestJson('https://jsonplaceholder.typicode.com/comments');

$import_posts = New ImportPosts();
$countPosts = $import_posts->importArr($request_posts, $db);

$import_comments = New ImportComments();
$countComments = $import_comments->importArr($request_comments, $db);

// echo '<br>Загружено '.$countComments.' комментариев';
echo '<br>Загружено '.$countPosts.' записей и '.$countComments.' комментариев';

$db->connect->close();

// echo '<pre>';
// var_dump($request_comments->dataResponse);
// echo '</pre>';
?>
