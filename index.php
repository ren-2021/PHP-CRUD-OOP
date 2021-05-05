<?php
   include 'Database/Connect.php';


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
<title>CRUD OOP</title>
</head>
<body>

<div class="row">
<div class="col-md-8 mt-5">
<div class="container ml-5">
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Occupation</th>
            <th>Birthplace</th>
            <th>Citizenship</th>
            <th>Sex</th>
            <th>Status</th>
        </tr>
        </thead>
        <?php
            $persons = $PersonObj->displayData();
            foreach($persons as $person){
             ?>
             
        <tbody>
            <tr>
            
                <td><?php echo $person['name']?></td>
                <td><?php echo $person['age']?></td>
                <td><?php echo $person['occupation']?></td>
                <td><?php echo $person['birthplace']?></td>
                <td><?php echo $person['citizenship']?></td>
                <td><?php echo $person['sex']?></td>
                <td><?php echo $person['status']?></td>
                <td><a name="" class="btn btn-primary" data-id="<?php echo $person['id'] ?>" href="edit.php?editId=<?php echo $person['id']; ?>" onclick="updateFunction()" role="button">Edit</a></td>
                <td><a name="" class="btn btn-danger" name="" href="Database/Connect.php?deleteId=<?php echo $person['id']; ?>" role="button" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
                
            </tr>
       
        </tbody>
        <?php } ?> 
         </table>
         

               
      </div>
      
   </div>

   <div class="col-md-4 mt-5" id="DIV">
     <div class="mr-5">
       <div class="form-group">
       <b><label for="my-input" id="labelId" class="ml-5">Add Person's Data</label></b>
        <form class="form-inline" method="POST" action="Database/Connect.php">
        <ul>
           <li style="list-style-type: none;">
           <input type="hidden" value="<?php echo $person['id'];?>" class="form-control mb-1" type="text" name="edit">
           <input id="name" class="form-control mb-1" type="text" name="name" placeholder="Full Name">
           <input id="age" class="form-control mb-1" type="text" name="age" placeholder="Age">
           <input id="occupation" class="form-control mb-1" type="text" name="occupation" placeholder="Occupation">
           <input id="birthplace" class="form-control mb-1" type="text" name="birthplace" placeholder="Birthplace">
           <input id="citizenship" class="form-control mb-1" type="text" name="citizenship" placeholder="Citizenship">
           <input id="sex" class="form-control mb-1" type="text" name="sex" placeholder="Sex">
           <input id="status" class="form-control mb-1" type="text" name="status" placeholder="Status">
     
           </li>
           <li style="list-style-type: none;">
           <button id="submitId" type="submit" name="submit" class="btn btn-primary mt-2 ml-2">Add</button>
           </li></ul>
           </form>
           
       </div>
       </div>
   </div>
</div>
</body>
</html>