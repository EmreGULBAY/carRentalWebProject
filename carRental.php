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
$dateErr="";
$start = $end = "";
$carid = $_SESSION["carid"];
$sql = "SELECT *
            FROM cars
            WHERE carid = '$carid'
            ";
$result = $db->query($sql);
$row = $result->fetch_assoc();
$image = $row["image"];
$brand = $row["brand"];
$rent = $row["rent"];
$location = $row["city"];
$info = $row["info"];
$plate=$row["plate"];
if (isset($_POST['Rent'])) {
    $start = $_POST["startdate"];
    $end = $_POST["enddate"];
    if (empty($start) || empty($end)) {
        $dateErr = 'Choose start and end date first!';
    }
    $sql = "SELECT startdate,enddate
                FROM reservation
                WHERE carid = '$carid' AND
                ((startdate BETWEEN '$start' AND '$end') OR
                (enddate BETWEEN '$start' AND '$end') OR
                ('$start' BETWEEN startdate AND enddate) OR
                ('$end' BETWEEN startdate AND enddate))";
    $result = $db->query($sql);
    if (mysqli_num_rows($result) > 0) {
        $dateErr = "Sorry car is already reserved";
    }
    if (empty($dateErr)) {
        $_SESSION["location"] = $location;
        $_SESSION["carid"] = $carid;
        $_SESSION["rent"] = $rent;
        $_SESSION["startdate"] = $start;
        $_SESSION["enddate"] = $end;
        $_SESSION["image"] = $image;
        header('Location:userMainPage.php');
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
    <a class="fa fa-home" onclick="closeAll()" href="userMainPage.php"
       style="color:red"> Home</a>
</div>
<div class="graySquare">
    <div class="round">
        <img src="<?php echo $image; ?>"  style="width:30%; height:30%;position:absolute;top:5%;left:35%;border-radius: 85px">
        <h2 style=";position:absolute;top:30%;">Location: <?php echo $location ?> </h2>
        <h2 style="position:absolute;top:30%;left:80%;"><?php echo $rent; ?> TL/day</h2>

    </div>

    <form action="#" method="post">
        <div  style="position:absolute;top:40%;">
            <h1>Start Date</h1>
            <input type="date" name="startDate" >
        </div>
        <div  style="position:absolute;top:40%;left:65%;">
            <h1>End Date</h1>
            <input type="date" name="endDate" >
        </div>
        <h3 style="position:absolute;top:70%; font-size: 1.5vw;">About Car:  <?php echo $plate." || ".$info?></h3>
    <div class="row">
        <input type="submit" value="Rent" style="position:absolute;top:90%;left:45%;">
    </div>
    </form>
</div>
</body>