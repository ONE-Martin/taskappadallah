<?php
require __DIR__.'/connection.php';
class Task
{
    protected $con;
    public function __construct()
    {
        $this->con=DBConnect::getInstance();
    }
    public function create($name, $description, $price)
    {
        $query=$this->con->prepare("insert into tasks(name, description, price) values(:name,:description,:price)");
        $query->bindParam("name", $name, PDO::PARAM_STR);
        $query->bindParam("description", $description, PDO::PARAM_STR);
        $query->bindParam("price", $price, PDO::PARAM_STR);
        $query->execute();

        return json_encode(
          ['task'=>[
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
        $query=$this->con->prepare("select * from tasks");
        $query->execute();
        $data=array();
        while ($row=$query->fetch(PDO::FETCH_ASSOC)) {
            $data[]= $row;
        }
        //print json_encode(['tasks'=>$data]);


        return json_encode(['tasks'=>$data]);
    } //end read

    public function Update($name, $description, $task_id)
    {   $task_id =intval($task_id);
        $query = $this->con->prepare("UPDATE tasks SET name = :name, description = :description WHERE id = :id");
        $query->bindParam("name", $name, PDO::PARAM_STR);
        $query->bindParam("description", $description, PDO::PARAM_STR);
        $query->bindParam("id", $task_id, PDO::PARAM_INT);
        $query->execute();
    }

    public function delete($task_id)
    {
      $task_id =intval($task_id);
      $query = $this->con->prepare("DELETE FROM tasks WHERE id = :id");
      $query->bindParam("id", $task_id, PDO::PARAM_INT);
      $query->execute();
    }

    public function getTotalPrice()
    {
      $query = $this->con->prepare(" SELECT SUM(tasks.price) AS totalPrice FROM tasks");
      $query->execute();
    }
} //end class
