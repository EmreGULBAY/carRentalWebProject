<?php
session_start();
?><?php
$db = mysqli_connect("localhost", "root", "", "web");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$id=$_SESSION['id'];
$resId=$_SESSION['resId'];
$query="select * from userwallet where id='$id';";
$results = mysqli_query($db, $query);
$result = mysqli_query($db, $query);
$result2 = mysqli_fetch_assoc($result);
$wallet=$result2['amount'];
$start = $_SESSION["startDate"];
$end = $_SESSION["endDate"];
$carid = $_SESSION["carid"];
$location = $_SESSION["location"];
$rent = $_SESSION["rent"];
$image =$_SESSION["image"];
$dateNow = date("Y-m-d");
$errors=array();
$diff = abs(strtotime($end) - strtotime($start));
$dateNow = date("Y-m-d");
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$carStatu = "SELECT * FROM cars WHERE carid='$carid';";
$result = mysqli_query($db, $carStatu);
$car = mysqli_fetch_assoc($result);
$status=$car['status'];
$totalCost=($months*30*$rent)+($days*$rent);
$query="select * from reservation where id='$id'";
$result=mysqli_query($db,$query);
$results=mysqli_fetch_assoc($result);
$oldCost=0;
if($results!=null)
$oldCost=$results['cost'];
$newWallet=$wallet-$totalCost+$oldCost;
if(isset($_POST['Rent'])){
    if($status==1) {
        if ($wallet >= $totalCost) {
            $sql="delete from reservation where reservationid='$resId'";
            mysqli_query($db,$sql);
            $query = "INSERT INTO reservation(startdate, enddate, cost, carid,id,datetime)
            VALUES('$start','$end','$totalCost','$carid','$id','$dateNow')";
            mysqli_query($db, $query);
            $query2 = " UPDATE  userwallet set amount='$newWallet' where id='$id';";
            mysqli_query($db, $query2);
            $sql = "SELECT startdate,enddate
                FROM reservation
                WHERE carid = '$carid' AND
                ((startdate BETWEEN '$start' AND '$end') OR
                (enddate BETWEEN '$start' AND '$end') OR
                ('$start' BETWEEN startdate AND enddate) OR
                ('$end' BETWEEN startdate AND enddate)) and id<>'$id'";
            $result = $db->query($sql);
            if (mysqli_num_rows($result) > 0) {
                array_push( $errors,'Sorry the car is already reserved!');
            }
            $sql2="delete from reservation where id='$id'";
            mysqli_query($db,$sql2);
            header("Location:userMainPage.php");
        } else {
            array_push($errors, 'You dont have enough money to rent!');
        }
    }
    else{
        array_push($errors, 'Sorry the car is already rented!');
    }
}

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
</style>
<body>
<div class="navbar">
    <a class="fa fa-home" href="userMainPage.php"
       style="color:red"> Home</a>
</div>
<div class="graySquare">
    <div class="round">
        <img src="<?php echo $image; ?>"  style="width:30%; height:30%;position:absolute;top:5%;left:35%;border-radius:85px;">
        <h2 style=";position:absolute;top:30%;">Location: <?php echo $location ?> </h2>
        <h2 style="position:absolute;top:30%;left:80%;"><?php echo $rent; ?> $/day</h2>
        <form action="#" method="post">
            <?php
            if (count($errors) > 0) : ?>
                <div class="error">
                    <?php foreach ($errors as $error) : ?>
                        <p><?php echo $error ?></p>
                    <?php endforeach ?>
                </div>
            <?php  endif ?>
            <h1 style="position:absolute;top:50%;left:30%;">TOTAL COST: <?php echo $totalCost."$"?></h1>
            <div class="row">
                <input type="submit" value="Update" name="Rent" style="position:absolute;top:80%;left:45%;">
            </div>
        </form>
    </div>
</body>
</html>
