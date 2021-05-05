<?php
class DBClass{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $db = 'persondata';
    public $conn; 

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db);
        if(mysqli_connect_error()){
            trigger_error("ERROR"). mysqli_connect_error();
        }
        else{
            return $this->conn;
        }
      }

      public function insertData($post){
          $name = $this->conn->real_escape_string($_POST['name']);
          $age = $this->conn->real_escape_string($_POST['age']);
          $occupation = $this->conn->real_escape_string($_POST['occupation']);
          $birthplace = $this->conn->real_escape_string($_POST['birthplace']);
          $citizenship = $this->conn->real_escape_string($_POST['citizenship']);
          $sex = $this->conn->real_escape_string($_POST['sex']);
          $status = $this->conn->real_escape_string($_POST['status']);

          $query = "INSERT INTO person (name, age, occupation, birthplace, citizenship, sex, status) VALUES ('$name', '$age', '$occupation', '$birthplace', '$citizenship', '$sex', '$status')";
          $sql = $this->conn->query($query);
          if($sql==true){
              header("Location: ../index.php");
          }
          else{
              echo "ERROR";
          }
      }

      public function displayData(){
          $query = "SELECT * FROM person";
          $display = $this->conn->query($query);
          if($display->num_rows > 0){
              $data = array();
              While($row = $display->fetch_assoc()){
                 $data[] = $row;
            }
            return $data;
          }else{
              echo "no record";
          }
      }

      public function showData($id){
        $query = "SELECT * FROM person WHERE id =$id";
        $result = $this->conn->query($query);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            return $row;
        }else{
            echo "ERROR";
        }
      }

      public function deleteData($id){
        $query = "DELETE FROM person WHERE id =$id";
        $delete = $this->conn->query($query);
        if($delete==true){
            header("Location: ../index.php");
        }else{
            echo "Unable to delete";
        }
      }

      

      public function editData($postData){
        $name = $this->conn->real_escape_string($_POST['name']);
        $age = $this->conn->real_escape_string($_POST['age']);
        $occupation = $this->conn->real_escape_string($_POST['occupation']);
        $birthplace = $this->conn->real_escape_string($_POST['birthplace']);
        $citizenship = $this->conn->real_escape_string($_POST['citizenship']);
        $sex = $this->conn->real_escape_string($_POST['sex']);
        $status = $this->conn->real_escape_string($_POST['status']);
        $id = $this->conn->real_escape_string($_POST['id']);

            if(!empty($id) && !empty($postData)){
                $query = "UPDATE person set name='$name', age='$age', occupation='$occupation', birthplace='$birthplace', citizenship='$citizenship', sex='$sex', status='$status' WHERE id='$id'";
                $update = $this->conn->query($query);
                if($update == true){
                header("Location: ../index.php");
            }
            else{
                echo "Unable to update";
            }
            }
    
      }
    }



$PersonObj = new DBClass;

if(isset($_POST['submit'])){
    $PersonObj->insertData($_POST);
}

if(isset($_GET['deleteId'])){
    $deleteId = $_GET['deleteId'];
    $PersonObj->deleteData($deleteId);

}

if(isset($_POST['update'])){
    $PersonObj->editData($_POST);
}

