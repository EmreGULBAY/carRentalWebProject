<?php
session_start();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!DOCTYPE html>
<?php
$db = mysqli_connect("localhost", "root", "", "web");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$carId = $_SESSION["carid"];
$errors = array();
$sql = "SELECT *
            FROM cars
            WHERE carid = '$carId'
            ";

$stat= "SELECT status FROM cars WHERE carid='$carId'";
$result2=mysqli_query($db,$stat);
$result3=mysqli_fetch_assoc($result2);
$status=$result3['status'];
$result = $db->query($sql);
$row = $result->fetch_assoc();
$image = $row["image"];
$brand = $row["brand"];
$rent = $row["rent"];
$location = $row["city"];
$info = $row["info"];
$plate=$row["plate"];
if (isset($_POST['Delete'])) {
    if($status!=0){
        $sql="delete  from cars where carid='$carId'";
        mysqli_query($db,$sql);
            header('Location:adminPage.php');
    }
    else{
        echo "<script>alert('You cannot delete car that is used!')</script>";
    }
}
?>
<html lang="en" dir="ltr">
<style>
    body{
        margin: 0;
        animation:anime 25s infinite alternate;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
    @keyframes anime{

        0%{
            background: url("araba1.jpg") no-repeat fixed center center;
            background-size: cover;
            max-width: 100%;
        }

        25%{
            background: url("araba6.jpg") no-repeat fixed center center;
            background-size: cover;
            max-width: 100%;
        }

        50%{
            background: url("araba7.jpg") no-repeat fixed center center;
            background-size: cover;
            max-width: 100%;
        }

        75%{
            background: url("araba8.jpg") no-repeat fixed center center;
            background-size: cover;
            max-width: 100%;
        }

        100%{
            background: url("araba9.jpg") no-repeat fixed center center;
            background-size: cover;
            max-width: 100%;
        }
    }
    .error {
        width: 92%;
        margin: 0px auto;
        padding: 10px;
        border: 1px solid #a94442;
        color: #a94442;
        background: #f2dede;
        border-radius: 5px;
        text-align: left;
        position:absolute;
    }
    input date{
        margin-left: 2%;
        margin-top: 1%;
        float: left;
        padding: 15px;

    }
    .navbar a {
        float: left;
        color: red;
        padding: 30px 60px;
        font-size: 20px;
    }
    .navbar a:hover{
        background-color: aqua;
        color: red;
    }
    .navbar {
        overflow: hidden;
    }
    .graySquare {
        background-color: rgba(255, 255, 255, 0.8);
        text-align: center;
        width: 40%;
        height: 60%;
        padding: 20px;
        border:solid 5px black;
        position: absolute;
        top: 20%;
        left: 30%;
    }
    @media only screen and (max-width: 1200px) {
        .graySquare{
            top: 100px;
            float: left;
            height: 400px;
            width:50%;
            justify-content: center;
        }
        img{
            height:20%;
        }
    }

</style>
<body>
<div class="navbar">

    <a class="fa fa-home" href="adminPage.php"
       style="color:red;text-decoration: none"> Home</a>
    <a  href="firstLogin.php"
        style="color:red;text-decoration: none;left:45%;position: absolute"> Sign Out</a>
</div>
<div class="graySquare">
    <div>
        <img src="<?php echo $image; ?>"  style="width:30%; height:30%;position:absolute;top:5%;left:35%;border-radius:85px;">
        <h2 style=";position:absolute;top:30%;">Location: <?php echo $location ?> </h2>
        <h2 style="position:absolute;top:30%;left:80%;"><?php echo $rent; ?> $/day</h2>

    </div>

    <form action="#" method="post">
        <?php
        if (count($errors) > 0) : ?>
            <div class="error">
                <?php foreach ($errors as $error) : ?>
                    <p><?php echo $error ?></p>
                <?php endforeach ?>
            </div>
        <?php  endif ?>
        <div  style="position:absolute;top:40%;opacity:0">
            <h1>Start Date</h1>
            <input type="date" name="startDate" >
        </div>
        <div  style="position:absolute;top:40%;left:65%; opacity:0">
            <h1>End Date</h1>
            <input type="date" name="endDate"  >
        </div>
        <h3 style="position:absolute;top:70%; left:20%;font-size: 1.5vw;">About Car:  <?php echo $plate." || ".$info?></h3>
        <div class="row">
            <input type="submit" value="Delete" name="Delete" style="position:absolute;top:90%;left:45%;">
        </div>

    </form>
</div>
</body>