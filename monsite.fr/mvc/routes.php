<?php
   
  function call($cont, $act) {
    require_once('controllers/controller_'.$cont.'.php');   
    switch ($cont) {
     case 'pages': 
                 $controller = new PagesController();          
                 break;
     case 'posts':
                echo  $cont;
                require_once('models/post.php');
                $controller =new PostsController();
                break;

    }
    
    $controller->{$act}();

  }

  
  $controllers=array('pages'=>['home','error'],
                     'posts'=>['index', 'show', 'new_post', 'val_new_post', 'delete', 'update', 'val_update']);

  //var_dump($controllers);
  if(array_key_exists($controller, $controllers)) {
    if (in_array($action,$controllers[$controller])) {
      call($controller, $action);
    }
    else {
      call('pages', 'home');
    }
  }
  else {
    call('pages', 'error');
  }
?>
