<?php
require __DIR__.'/connection.php';
class Article
{
    protected $con;
    public function __construct()
    {
        $this->con=DBConnect::getInstance();
    }
    public function create($name, $description, $price)
    {
        $query=$this->con->prepare("insert into articles(name, description, price) values(:name,:description,:price)");
        $query->bindParam("name", $name, PDO::PARAM_STR);
        $query->bindParam("description", $description, PDO::PARAM_STR);
        $query->bindParam("price", $price, PDO::PARAM_STR);
        $query->execute();

        return json_encode(
          ['article'=>[
                                      'id'=>$this->con->lastInsertId(),
                                      'name'=>$name,
                                      'description'=>$description,
                                      'price'=>$price
                                   ]
                          ]
                         );
    }//end create

    public function read()
    {
        $query=$this->con->prepare("select * from articles");
        $query->execute();
        $data=array();
        while ($row=$query->fetch(PDO::FETCH_ASSOC)) {
            $data[]= $row;
        }
        //print json_encode(['articles'=>$data]);


        return json_encode(['articles'=>$data]);
    } //end read

    public function Update($name, $description, $article_id)
    {   $article_id =intval($article_id);
        $query = $this->con->prepare("UPDATE articles SET name = :name, description = :description WHERE id = :id");
        $query->bindParam("name", $name, PDO::PARAM_STR);
        $query->bindParam("description", $description, PDO::PARAM_STR);
        $query->bindParam("id", $article_id, PDO::PARAM_INT);
        $query->execute();
    }

    public function delete($article_id)
    {
      $article_id =intval($article_id);
      $query = $this->con->prepare("DELETE FROM articles WHERE id = :id");
      $query->bindParam("id", $article_id, PDO::PARAM_INT);
      $query->execute();
    }

    public function getTotalPrice()
    {
      $query = $this->con->prepare(" SELECT SUM(tasks.price) AS totalPrice FROM tasks");
      $query->execute();
    }
} //end class
