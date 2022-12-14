<?php

class Post
{
  //DB Stuff
  private $conn;
  private $table = 'posts';

  // Post properties
  public $id;
  public $category;
  public $category_name;
  public $title;
  public $body;
  public $author;
  public $created_at;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Get posts
  public function read()
  {
    // Create query 
    $query = " SELECT 
      c.name as category_name,
      p.id,
      p.category_id,
      p.title,
      p.body,
      p.author,
      p.created_at
    FROM
      {$this->table} p
    LEFT JOIN 
      categories c ON p.category_id = c.id
    ORDER BY 
      p.created_at DESC
    ";

  // Prepare statements
  $stmt = $this->conn->prepare($query);

  // Execute query
  $stmt->execute();

  return $stmt;
  }
}
