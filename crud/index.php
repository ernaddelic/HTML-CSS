<!DOCTYPE html>
<?php include 'db.php';

$page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);

$perPage = (isset($_GET['per-page']) && (int)$_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 5);

$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$sql = "select * from tasks limit ".$start." , ".$perPage." ";

$total = $db->query("select * from tasks")->num_rows;

$pages = ceil($total / $perPage);

$rows = $db->query($sql);

?>
<html lang="en" dir="ltr">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>Crud app</title>
  </head>
  <body>
<h1>Todo list</h1>
<div class="container">
  <div class="row">


    <div class="col-md-10 col-md-offset-1">



          <button type="button" data-target = "#myModal" data-toggle = "modal" class="btn btn-success">Add task</button>
          <button type="button" class="btn btn-default" onclick = "print()">Print</button>
          <br><br>

          <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
        <form method="post" action="add.php">

          <div class="form-group">
            <label>Task Name</label>
            <input type="text" required name="task" class="form-control">

          </div>
          <input type="submit" name="send" value="Add task" class="btn btn-success">

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Task</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <?php while ($row = $rows->fetch_assoc()): ?>



      <th scope="row"><?php echo $row['id'] ?></th>
      <td class="col-md-10"><?php echo $row['name'] ?></td>

    <td><a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-success">Edit</a></td>
    <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
    </tr>
<?php endwhile; ?>

  </tbody>
</table>
<ul class="pagination">
  <?php for($i = 1 ; $i <= $pages; $i++): ?>
  <li><a href = "?page=<?php echo $i;?>&per-page=<?php echo $perPage;?>"><?php echo $i; ?></a></li>
<?php endfor; ?>
</ul>


    </div>

  </div>

</div>



  </body>
</html>
