<?php
  class PostsController {

    public function __construct(){}

    public function index() {
      echo "in index";
      $posts=Post::all();
      require_once('views/posts/index.php');

    }

    public function show() {

      if (!isset($_GET['id'])) return call('pages', 'error');      
      $post=Post::find($_GET['id']);
      require_once('views/posts/show.php');

   }
   public function new_post(){

     require_once('views/posts/new_post.php');
   }
   
   public function val_new_post(){
    $form_data = array($_POST["id"], $_POST["author"], $_POST["content"]);
    var_dump($form_data);
    if (!isset($_POST['id']) && isset($_POST['author']) && isset($_POST['content'])) call('pages', 'error');
      $id= $_POST['id'];
      $author=$_POST['author'];
      $content=$_POST['content'];
    $post=Post::insert($id, $author, $content);
    require_once('index.php');
  }
  public function delete() {

    if (!isset($_GET['id'])) return call('pages', 'error');      
    $post=Post::delete($_GET['id']);
    echo "Post deleted";
  }

  public function update(){

    require_once('views/posts/update.php');
  }

  public function val_update(){

    if (!isset($_POST['content'])) call('pages', 'error');
      $content=$_POST['content'];
    echo "yes mah dude";
    $post=Post::update($_GET['id'], $content);
    require_once('index.php');}
}
?>
