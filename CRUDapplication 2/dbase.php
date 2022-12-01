<?php
class Data{
//class
    public function __construct(){
        $this->connection = new mysqli('172.31.22.43', 'Kihyeon200476247', 'Y_UZm8Ri87', 'Kihyeon200476247');
        if(mysqli_connect_error()){
            trigger_error(" DATA ERROR ". mysqli_connect_error() . mysqli_connect_error());
        }else{
            return $this->connection;
        }
    }

    // Insert
    public function insert($Post)
    {
        $fname = $this->connection->real_escape_string($_POST['fname']);
        $lname = $this->connection->real_escape_string($_POST['lname']);
        $email = $this->connection->real_escape_string($_POST['email']);
        $bio = $this->connection->real_escape_string($_POST['bio']);
        $password = $this->connection->real_escape_string($_POST['password']);

        $query="INSERT INTO Ftable(fname,lname,email,bio,password) VALUES('$fname','$lname','$email','$bio','$password')";
        $sql = $this->connection->query($query);
        if ($sql == true){
            header("Location: login.php?registration Successfull");
        }else{
            echo "Failed registration";
        }
    }


    // Fetch
    public function displayFetch()
    {
        $query = "SELECT * FROM Ftable";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }else{
            echo "ERROR: Product not found";
        }
    }
    public function sanitize($var){
        $return = mysqli_real_escape_string($this->connection, $var);
        return $return;
    }




    // Fetch single data for edit from customer table
    public function emailtable($email)
    {
        $query = "SELECT * FROM Ftable WHERE email = '$email'";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }else{
            echo "<script>alert('User Not found')</script>";
            return null;
            }
    }

    // Update customer data into customer table
    public function updateRecord($postData)
    {
        $Productname = $this->connection->real_escape_string($_POST['uProductname']);
        $Productnumber = $this->connection->real_escape_string($_POST['uProductnumber']);
        $Qty = $this->connection->real_escape_string($_POST['uQty']);
        $Price = $this->connection->real_escape_string($_POST['uPrice']);
        $CustomerID = $this->connection->real_escape_string($_POST['CustomerID']);
        if(!empty($CustomerID) && !empty($postData)) {
            $query = "UPDATE PRODUCT SET Productname = '$Productname', Productnumber = '$Productnumber', Qty = '$Qty',Price = '$Price' WHERE CustomerID = '$CustomerID'";
            $sql = $this->connection->query($query);
            if ($sql == true){
                header("Location:index.php?msg2=update");
            }else{
                echo "Failed Update!";
            }
        }

    }

    // Delete customer data from customer table
    public function deleteRecord($CustomerID)
    {
        $query = "DELETE FROM PRODUCT WHERE CustomerID = '$CustomerID'";
        $sql = $this->connection->query($query);
        if ($sql==true) {
            header("Location:index.php?msg3=delete");
        }else{
            echo "Record does not delete try again";
        }
    }
}
$database = new Data();

?>
