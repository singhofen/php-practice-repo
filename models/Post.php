<?php

class Post {
   //DB stuff
   private $conn;
   private $table;

   //post properties
   public $id;
   public $category_id;
   public $category_name;
   public $title;
   public $body;
   public $author;
   public $created_at;

   //constructor  with DB
   public function read(){
      //create query
      $query = 'SELECT
       c.name as category_name,
        p.id, 
        p.category_id,
        p.body,
        p.author,
        p.created_at
        FROM 
        ' . $this->table . ' p LEFT JOIN 
         categories c ON p.catergory_id = c.id
         ORDER BY
         p.created_at DESC';

         //PEREPARED STATEMENT
         $stmt = $this->conn->prepare($query);

         //execute query
         $stmt->execute();

         return $stmt;
   }

}