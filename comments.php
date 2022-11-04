<?php
    if(isset($_POST['submit'])) {
        $author = $_POST['author'];
        $text = $_POST['text'];
        $post_id = $_GET['post_id'];

        if(empty($author) || empty($text)) {
            echo("Nisu svi podaci popunjeni");
        } else {
            $currentDate = date('Y-m-d h:i');
             $sql = "INSERT INTO comments (author, text, post_id)
                VALUES('$author', '$text', '$post_id')";

                 $statement = insertData($sql, $connection);
        }
    } 
 ?>
<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            <form method="post" class="form-group">
                <div class="row">
                    Author: <input type="text" name="author" class="form-group">
                </div>
                <div class="row">
                    Text: <textarea name="text" class="form-group"></textarea>
                </div>
                
                <input type="submit" name="submit" class="form-group">
            </form>
        </div>    
    </div>
</main>