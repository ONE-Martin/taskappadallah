<?php

    class Post {

     public $id;
     public $author;
     public $content;

    public function __construct($id,$author,$content) {

       $this->id =$id;
       $this->author=$author;
       $this->content=$content;

    } //end construct

    public function all() {
        //echo " in all function ";
   
        $list=array();
        $con=DBConnect::getInstance();//static method

        $posts= $con->query('SELECT * FROM posts');
        
        foreach ($posts as $post)
            $list[]= new Post($post['id'],$post['author'], $post['content']);
        //var_dump($list);
        return $list;
     
     }
    public function find($id) {
      $con=DBConnect::getInstance();
      $id= intval($id);
      $req=$con->prepare('SELECT * FROM posts where id=:id');
      $req->execute(array('id'=>$id));
      $post=$req->fetch();
      return new Post($post['id'], $post['author'],$post['content']);

    }

    public function insert($id, $author, $content) {
        // if(find($id)) {echo "Un post avec cet ID existe deja";}
        $con = DBConnect::getInstance();
        $req=$con->prepare('INSERT INTO posts (id, author, content) 
        VALUES (:id, :author, :content)');
        $req->execute(array('id'=>$id, 'author'=>$author, 'content'=>$content));
        echo "Post has been added";
    }

    public function delete($id) {
        $con=DBConnect::getInstance();
        $req=$con->prepare('DELETE FROM posts where id=:id');
        $req->execute(array('id'=>$id));
    }

    public function update($id, $content) {
        $con=DBConnect::getInstance();
        $req=$con->prepare('UPDATE posts SET content=:new_content WHERE id=:id');
        $req->execute(array('id'=>$id, 'new_content'=>$content));
        echo "Post has been updated";
    }
    

}//end class Post

?>

