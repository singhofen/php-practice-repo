<?php
//header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

//instantiate DB & Connect
$database = new Database();
$db = $database->connect();

//blog post query
$result = $post->read();
//get row ccount
$num = $result->rowCount();

//check if any posts
if($num > 0){
   //post array
   $posts_arr = array();
   $posts_arr['data'] = array();

   while($row = $result->fetch(PDO::FETCH_ASSOC)){
      extract($row);

      $post_itme = array(
         'id' => $id,
         'title' => $title
         'body' => html_entity_decode($body),
         'authoer' => $author,
         'category_id' => $category_id,
         'category_name' => $category_name
      );

      //push to data
      array_push($posts_arr['data'], $post_itme);

   }
   //turn to json and output
   echo json_encode($posts_arr);
} else{
   //no posts
   echo json_encode(array('message' => 'No posts found'));
}