<?php
    include('header.php');
    include('dbcon.php');
?>
        <div class="box1">
            <h2>ALL POSTS</h2>
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD POST</button>
        </div>
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>description</th>
                    <th>content</th>
                    <th>created_at</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "select * from `posts`";
                    $result = mysqli_query($connection, $query);
                    if(!$result) {
                        die("query Failed".mysqli_error($connection));
                    } else {
                        while($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['content']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                        <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
        <?php
          if(isset($_GET['message'])){
            echo "<h6>".$_GET['message']."</h6>";
          }
        ?>
        <?php
          if(isset($_GET['insert_msg'])){
            echo "<h6>".$_GET['insert_msg']."</h6>";
          }
        ?>
        <?php
          if(isset($_GET['update_msg'])){
            echo "<h6>".$_GET['update_msg']."</h6>";
          }
        ?>
        <?php
          if(isset($_GET['delete_msg'])){
            echo "<h6>".$_GET['delete_msg']."</h6>";
          }
        ?>
        <form action="insert_data.php" method="post">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD POSTS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                    <label for="title">title</label>
                    <input type="text" name="title" id="title" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="description">description</label>
                    <input type="text" name="description" id="description" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="content">content</label>
                    <input type="text" name="content" id="content" class="form-control">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-success" name="add_posts" value="ADD">
              </div>
            </div>
          </div>
        </div>
        </form>
<?php
    include('footer.php');
?>