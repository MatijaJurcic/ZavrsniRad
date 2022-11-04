<?php 
    include('db.php');

    $sql = "SELECT id, title, author, body, created_at FROM posts ORDER by created_at DESC";
    $posts = getData($sql, $connection, true);
 
    foreach($posts as $post) {   
        echo '<h2 class="blog-post-title"><a href="single-post.php?post_id='.$post['id'].'">'; echo $post['title'];  echo '</a></h2>';
        echo '<p class="blog-post-meta">'; echo $post['created_at'];
        echo'<a href="#">'; echo $post['author']; echo'</a></p>';
    }
?>