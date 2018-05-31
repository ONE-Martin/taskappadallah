<h2> all posts </h2>

<?php
    foreach ($posts as $post) { ?>
      <br/> <?php echo $post->author;?> 
      <!-- <a  href='index.php?controller=posts&action=show&id=<?php echo $post->id;?>'>see content </a>  -->
      <a  href='show/<?php echo $post->id;?>'>see content </a> <br>
      <a href='delete/<?php echo $post->id;?>'> Delete post</a> <br>
      <a href='update/<?php echo $post->id;?>'> Update post</a> <br> <br>
<?php }?>

