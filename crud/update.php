<!DOCTYPE html>
<?php include 'db.php';

$id = (int)$_GET['id'];

$sql = "select * from tasks where id='$id'";

$rows = $db->query($sql);

$row = $rows->fetch_assoc();

if (isset($_POST['send'])) {

  $task = htmlspecialchars($_POST['task']);

  $sql = "update  tasks set name = '$task' where id = '$id'";

  $db->query($sql);

  header('location: index.php');

}





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
<h1>Update Todo list</h1>
<div class="container">
  <div class="row">


    <div class="col-md-10 col-md-offset-1">
      <table class="table">



          <hr><br>





        <form method="post">

          <div class="form-group">
            <label>Task Name</label>
            <input type="text" required name="task" value="<?php echo $row['name']?>" class="form-control">

          </div>
          <input type="submit" name="send" value="Add task" class="btn btn-success">&nbsp;
          <a href = "index.php" class="btn btn-warning">Back</a>


        </form>





    </div>

  </div>

</div>

  </body>
</html>
