<?php include ('header.php') ?>
<?php
  include('db.php');
  if (isset($_POST['delete']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM posts WHERE id = '$id'";
    $statement = $connection->prepare($sql);
    $statement->execute();
  }

  if (isset($_GET['post_id'])) {
      $sql = "SELECT title, author, body, created_at FROM posts WHERE id = {$_GET['post_id']}";
      $singlePost = getData($sql, $connection);
      
      $sql2 = "SELECT * FROM comments WHERE post_id = {$_GET['post_id']}";
      $comments = getData($sql2, $connection, true);
  ?>
  <main role="main" class="container">
    <div class="row">
      <div class="col-sm-8 blog-main">
        <article class="va-c-article">
              <h1><?php echo $singlePost['title']; ?></h1>
              <div class="va-c-article__meta"><?php echo $singlePost['created_at']?> by <?php echo $singlePost['author']?></div>
              <div>
                  <p><?php echo $singlePost['body']?></p>
              </div>
              <div class="comments">
                  <h2>Comments</h2>
                  <?php 
                    if (empty($comments)) {
                      echo "There are no added comments yet.";
                    }

                    foreach($comments as $comment) { ?>
                      <div class="single-comment">
                          <div>posted by: <strong><?php echo $comment['author']?></strong>
                          <div><?php echo $comment['text']?>
                          </div>
                      </div>
                    <?php } ?>   
              
              </div>
              <?php include('comments.php'); ?>
          </article>
      </div>
<?php
    } else {
        echo('post_id nije prosledjen kroz $_GET');
    }

    include ('sidebar.php');
?>
</div>
</main>
<?php include('footer.php'); ?>