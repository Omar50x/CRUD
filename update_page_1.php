<?php
    include('header.php');
    include('dbcon.php');
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "select * from `posts` where `id` = '$id'";
        $result = mysqli_query($connection, $query);
        if(!$result) {
            die("query Failed".mysqli_error($connection));
        } else {
            $row = mysqli_fetch_assoc($result);
        }
    }

    if(isset($_POST['update_posts'])){
        if(isset($_GET['id_new'])){
            $idnew = $_GET['id_new'];
        }
        $title = addslashes($_POST['title']);
        $description = addslashes($_POST['description']);
        $content = addslashes($_POST['content']);
        $query = "update `posts` set `title` = '$title', `description` = '$description', `content` = '$content' where `id` = '$idnew'";
        $result = mysqli_query($connection, $query);
        if(!$result) {
        die("query Failed".mysqli_error($connection));
        } else {
            header('location:index.php?update_msg=You have successfully update the data.');
        }
    }
?>

<form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="title">title</label>
        <input type="text" name="title" id="title" class="form-control" value="<?php echo $row['title'] ?>">
    </div>
    <div class="form-group">
        <label for="description">description</label>
        <input type="text" name="description" id="description" class="form-control" value="<?php echo $row['description'] ?>">
    </div>
    <div class="form-group">
        <label for="content">content</label>
        <input type="text" name="content" id="content" class="form-control" value="<?php echo $row['content'] ?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_posts" value="UPDATE">
</form>

<?php
    include('footer.php');
?>