<?php
    include 'dbcon.php';
    if(isset($_POST['add_posts'])){
        $title = addslashes($_POST['title']);
        $description = addslashes($_POST['description']);
        $content = addslashes($_POST['content']);

        if($title == "" || empty($title)){
            header('location:index.php?message=You need to fill in the title!');
        } else {
            $query = "insert into `posts` (`title`, `description`, `content`) values ('$title', '$description', '$content')";
            $result = mysqli_query($connection, $query);
            if(!$result){
                die("Query Failed".mysqli_error($connection));
            } else {
                header('location:index.php?insert_msg=You data has been added successfully');
            }
        }
    }
?>