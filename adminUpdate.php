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
$plate = "";
$image = "";
$locat = "";
$brand = "";
$rent = "";
$info = "";
$type="";
$dateNow=date("Y-m-d");
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'web');
$sql = "select * from cars where carid='$carId'";
$result=mysqli_query($db,$sql);
$result2=mysqli_fetch_assoc($result);
$oldPlate=$result2['plate'];
$oldImage = $result2['image'];
$oldLocat = $result2['city'];
$oldBrand = $result2['brand'];
$oldRent = $result2['rent'];
$oldInfo = $result2['info'];
$oldType = $result2['type'];
$oldst = $result2['repair'];
if (isset($_POST['Save'])) {
    $plate = mysqli_real_escape_string($db, $_POST['plate']);
    $image = $_POST['image'];
    $locat = $_POST['locat'];
    $brand = $_POST['brand'];
    $rent = $_POST['rentCost'];
    $info = $_POST['info'];
    $type= $_POST['type'];
    $repair= $_POST['repair'];

    $st=0;

    if($repair=="Active")
    $st=1;
    if (empty($plate)) {
        array_push($errors, "Plate is required");
    }
    if (empty($image)) {
        array_push($errors, "Image is required");
    }
    if (empty($locat)) {
        array_push($errors, "City is required");
    }
    if (empty($brand)) {
        array_push($errors, "Brand is required");
    }
    if (empty($rent)) {
        array_push($errors, "Rent is required");
    }
    if (empty($info)) {
        array_push($errors, "Info is required");
    }
    $carCheck = "SELECT * FROM cars WHERE plate='$plate' LIMIT 1";
    $result = mysqli_query($db, $carCheck);
    $car = mysqli_fetch_assoc($result);
    if ($car) {
        if ($car['plate'] === $plate)
            array_push($errors, "Car exist!");
    }
    $sql="select * from reservation where carid='$carId' and startdate<='$dateNow'";
    $result = mysqli_query($db, $sql);
    $car= mysqli_fetch_assoc($result);
    if($st!=$oldst){
        echo "<script>alert('Car is used!')</script>";
    }
    if (count($errors) == 0) {
        if($oldst==0 && $st==1){
        $sql = "update cars set plate='$plate',image='$image',city='$locat',brand='$brand',rent='$rent',info='$info',type='$type',repair='$st'
        where carid='$carId'";
     mysqli_query($db, $sql);
            $sql2="insert into repairedcars(carid,date) values('$carId','$dateNow')";
            mysqli_query($db,$sql2);
        }
        else {
            $sql = "update cars set plate='$plate',image='$image',city='$locat',brand='$brand',rent='$rent',info='$info',type='$type',repair='$st'
        where carid='$carId'";
            mysqli_query($db, $sql);
        }

    header('location: adminPage.php');

    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <style>

        .error {
            width: 92%;
            margin: 0px auto;
            padding: 10px;
            border: 1px solid #a94442;
            color: #a94442;
            background: #f2dede;
            border-radius: 5px;
            text-align: left;
        }
        body{
            margin: 0;
            animation:anime 25s infinite alternate;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .navbar a {
            float: left;
            color: black;
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
        #Add{
            position: relative;
            display: block;
            width:30%;
            height: 85%;
            top: 5%;
            left: 35%;
            margin: 10px;
            border:solid black 5px;
            background: rgba(255, 255, 255, 0.5) fixed center center;
            max-width: 100%;
            background-size:contain;
            padding:20px;
        }
        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }
        .inputs{
            width: 70%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
<body>

<div class="navbar">

    <a class="fa fa-home" href="adminPage.php"
       style="color:red;text-decoration: none"> Home</a>
    <a  href="firstLogin.php"
        style="color:red;text-decoration: none;left:45%;position: absolute"> Sign Out</a>
</div>
<div id="Add">
    <form method="post" action="#">
        <?php
        if (count($errors) > 0) : ?>
            <div class="error">
                <?php foreach ($errors as $error) : ?>
                    <p><?php echo $error ?></p>
                <?php endforeach ?>
            </div>
        <?php  endif ?>
        <div class="row">
            <div class="col-25">
                <label for="plate">Plate</label>
            </div>
            <div class="col-75">
                <input class="inputs" type="text" id="plate" name="plate" value="<?php echo $oldPlate?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="image">Image</label>
            </div>
            <div class="col-75">
                <input class ="inputs" type="text"  id="image" name="image" value="<?php echo $oldImage?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="locat">Location</label>
            </div>
            <div class="col-75">
                <input class="inputs" type="text" id="locat" name="locat" value="<?php echo $oldLocat?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="info">Brand</label>
            </div>
            <div class="col-75">
                <input class="inputs" type="text" id="info" name="brand" value="<?php echo $oldBrand?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="rentCost">Rent cost/daily</label>
            </div>
            <div class="col-75">
                <input class="inputs" type="text" id="rentCost" name="rentCost" value="<?php echo $oldRent?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="info">Info</label>
            </div>
            <div class="col-75">
                <input class ="inputs" type="text"  id="info" name="info" value="<?php echo $oldInfo?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="type">Type</label>
            </div>
            <div class="col-75">
                <input class="inputs" type="text" id="type" name="type" value="<?php echo $oldType?>">
            </div>
        </div>
        <input type="radio" id="html" name="repair" value="On repair">
         <label for="html">On repair</label><br>
        <input type="radio" id="css" name="repair" value="Active">
         <label for="css">Active</label><br>
        <div class="row">
            <br>
            <input type="submit" value="Save"  name="Save">
        </div>

    </form>
</div>
</body>
