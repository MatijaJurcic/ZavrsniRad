<?php
    include('db.php');
    include('header.php');

    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $author = $_POST['author'];
        $created_at = date("Y-m-d H:i:s");

        if(empty($title) || empty($body) || empty($author)) {
            echo("Nisu svi podaci popunjeni");
        } else {
            $sql = "INSERT INTO posts (title, body, author, created_at)
            VALUES('$title', '$body', '$author', '$created_at')";

            $statement = insertData($sql, $connection);
            
        }
    } 
 ?>
      <main role="main" class="container">
        <div class="row">
            <div class="col-sm-8 blog-main">
                <form name="submit" method="post" class="form-group">
                    <div class="row">
                       Title: <input type="text" name="title" class="form-group">
                    </div>
                    <div class="row">
                       Author: <input type="text" name="author" class="form-group">
                    </div>
                    <div class="row">
                       Body: <textarea name="body" class="form-group"></textarea>
                    </div>
                    
                    <input type="submit" value="Add post" name="submit" class="form-group">
                </form>
            </div>    
        </div>
    </main>
<?php
    include('sidebar.php');
    include('footer.php');
?>