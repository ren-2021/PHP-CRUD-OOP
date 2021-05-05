<?php
   include 'Database/Connect.php';

   $personObj = new DBClass();
   if(isset($_GET['editId']) && !empty($_GET['editId'])){
    $editId = $_GET['editId'];
    $persondata = $PersonObj->showData($editId);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<title>EDIT</title>
</head>
<body>
   <div class="container card m-5 p-5">
      <h4 class="mb-5 ml-5 pl-3"> Update Person's Data </h4>
      <ul>
      <li style="list-style-type: none;">
      <form action="Database/Connect.php" method="post" class="form-inline">
          <div class="form-group m-3 mr-4">
              <b><label  for="my-input">Name :</label></b>
              <input id="my-input" class="form-control ml-3" type="text" name="name" value="<?php echo $persondata['name']; ?>">
          </div>
          <div class="form-group m-3 mr-5 pr-2">
              <b><label  for="my-input" class="ml-4">Age :</label></b>
              <input id="my-input" class="form-control ml-3" type="text" name="age" value="<?php echo $persondata['age']; ?>">
          </div>
          <div class="form-group">
              <b><label  for="my-input">Occupation :</label></b>
              <input id="my-input" class="form-control ml-3" type="text" name="occupation" value="<?php echo $persondata['occupation']; ?>">
          </div>
          <div class="form-group m-3">
              <b><label  for="my-input">Birthplace :</label></b>
              <input id="my-input" class="form-control ml-3" type="text" name="birthplace" value="<?php echo $persondata['birthplace']; ?>">
          </div>
          <div class="form-group m-3">
              <b><label  for="my-input">Citizenship :</label></b>
              <input id="my-input" class="form-control ml-3" type="text" name="citizenship" value="<?php echo $persondata['citizenship']; ?>">
          </div>
          <div class="form-group  m-3 ml-5">
              <b><label  for="my-input">Sex :</label></b>
              <input id="my-input" class="form-control ml-3" type="text" name="sex" value="<?php echo $persondata['sex']; ?>">
          </div>
          <div class="form-group m-3">
              <b><label  for="my-input">Status :</label></b>
              <input id="my-input" class="form-control ml-3" type="text" name="status" value="<?php echo $persondata['status']; ?>">
          </div>
          <div class="form-group">
          <input id="my-input" class="form-control" type="hidden" name="id" value="<?php echo $persondata['id']; ?>">   
          </div>
          </li>
          <li style="list-style-type: none;">
          <button id="updateId" type="submit" style="width:80px" name="update" class="btn btn-primary mt-2 ml-4">Update</button>
          </li>
          </ul>
      </form>
      
      </div>


</body>