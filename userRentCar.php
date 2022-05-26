<?php
    session_start();
?>
<?php
$db = mysqli_connect("localhost", "root", "", "web");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$id = $_SESSION['id'];
$sql = "SELECT *
          FROM cars;";
$result = $db->query($sql);
while ($row = $result->fetch_assoc()) {
    $carImg[$row['carid']]= $row['image'];

}
$sql2="select count(*) as x from cars";
$result=mysqli_query($db,$sql2);
$results=mysqli_fetch_assoc($result);
$City=[];
$carBrand=[];
$Type=[];
$count=$results['x'];

$sql = "SELECT city
            FROM cities;";
$result = $db->query($sql);
while ($row = $result->fetch_assoc()) {
    $City[]= $row['city'];
}
$sql = "SELECT  distinct type
            FROM cars;";
$result = $db->query($sql);
while ($row = $result->fetch_assoc()) {
    $Type[]= $row['type'];
}
$sql = "SELECT DISTINCT brand
            FROM cars;";
$result = $db->query($sql);
while ($row = $result->fetch_assoc()) {
    $carBrand[]= $row['brand'];
}

$cars= [];

if (isset($_POST["submit"])) {

    $brand = $_POST["brand"];
    $city = $_POST["City"];
    $type = $_POST["Type"];
    $start = $_POST["startdate"];
    $end = $_POST["enddate"];
    if (empty($start) || empty($end)) {
        if ($city == "All cities" && $brand == "All cars" && $type== "All types") {
            $sql = "SELECT *
                  FROM cars where status=1";
            $sql2 = "SELECT *,count(*) as total
                  FROM cars where status=1";
            $result=mysqli_query($db,$sql2);
            $data=mysqli_fetch_assoc($result);
            $count=$data['total'];
            $result = $db->query($sql);
            while ($row = $result->fetch_assoc()) {
                $cars[]= $row['carid'];
                $carArray[]= $row['image'];
            }

        }
        else if ($city == "All cities" && $brand=="All cars") {
            $sql = "SELECT *
                  FROM cars
                  WHERE status =1 and type='$type'";
            $sql2 = "SELECT *,count(*) as total
                  FROM cars where status=1 and type='$type'";
            $result=mysqli_query($db,$sql2);
            $data=mysqli_fetch_assoc($result);
            $count=$data['total'];
            $result = $db->query($sql);
            while ($row = $result->fetch_assoc()) {
                $cars[]= $row['carid'];
                $carArray[]= $row['image'];
            }
        }
        else if ($type == "All types" && $brand=="All cars") {
            $sql = "SELECT *
                  FROM cars
                  WHERE status =1 and city='$city'";
            $sql2 = "SELECT *,count(*) as total
                  FROM cars where status=1 and city='$city'";
            $result=mysqli_query($db,$sql2);
            $data=mysqli_fetch_assoc($result);
            $count=$data['total'];
            $result = $db->query($sql);
            while ($row = $result->fetch_assoc()) {
                $cars[]= $row['carid'];
                $carArray[]= $row['image'];
            }
        }
        else if ($city == "All cities" && $type=="All types") {
            $sql = "SELECT *
                  FROM cars
                  WHERE status =1 and brand='$brand'";
            $sql2 = "SELECT *,count(*) as total
                  FROM cars where status=1 and brand='$brand'";
            $result=mysqli_query($db,$sql2);
            $data=mysqli_fetch_assoc($result);
            $count=$data['total'];
            $result = $db->query($sql);
            while ($row = $result->fetch_assoc()) {
                $cars[]= $row['carid'];
                $carArray[]= $row['image'];
            }
        }
        else if ($city == "All cities") {
            $sql = "SELECT *
                  FROM cars
                  WHERE status =1 and brand = '$brand' and type='$type'";
            $sql2 = "SELECT *,count(*) as total
                  FROM cars where status=1 and brand = '$brand' and type='$type'";
            $result=mysqli_query($db,$sql2);
            $data=mysqli_fetch_assoc($result);
            $count=$data['total'];
            $result = $db->query($sql);
            while ($row = $result->fetch_assoc()) {
                $cars[]= $row['carid'];
                $carArray[]= $row['image'];
            }
        }
        else if ($type == "All types") {
            $sql = "SELECT *
                  FROM cars
                  WHERE status =1 and brand = '$brand' and city='$city'";
            $sql2 = "SELECT *,count(*) as total
                  FROM cars where status=1 and brand = '$brand' and city='$city'";
            $result=mysqli_query($db,$sql2);
            $data=mysqli_fetch_assoc($result);
            $count=$data['total'];
            $result = $db->query($sql);
            while ($row = $result->fetch_assoc()) {
                $cars[]= $row['carid'];
                $carArray[]= $row['image'];
            }
        }

        else if ($brand == "All cars") {
            $sql = "SELECT *
                  FROM cars
                  WHERE status=1 and  city = '$city' and type='$type'
                  ";
            $sql2 = "SELECT *,count(*) as total
                  FROM cars where status=1 and city = '$city' and type='$type'";
            $result=mysqli_query($db,$sql2);
            $data=mysqli_fetch_assoc($result);
            $count=$data['total'];
            $result = $db->query($sql);

            while ($row = $result->fetch_assoc()) {
                $cars[]= $row['carid'];
                $carArray[]= $row['image'];
            }
        }
        else {

            $sql = "SELECT *
                  FROM cars
                  WHERE status=1 and(city = '$city') and(type='$type') AND (brand = '$brand' AND carid NOT IN (SELECT carid
                          FROM reservation
                          WHERE (startdate BETWEEN '$start' AND '$end') OR (enddate BETWEEN '$start' AND '$end')))";
            $sql2 = "SELECT *,count(*) as total
                  FROM cars where status=1 and(city = '$city') and(type='$type') AND (brand = '$brand' AND carid NOT IN (SELECT carid
                          FROM reservation
                          WHERE (startdate BETWEEN '$start' AND '$end') OR (enddate BETWEEN '$start' AND '$end')))";
            $result=mysqli_query($db,$sql2);
            $data=mysqli_fetch_assoc($result);
            $count=$data['total'];
            $result = $db->query($sql);
            while ($row = $result->fetch_assoc()) {
                $cars[]= $row['carid'];
                $carArray[]= $row['image'];
            }
        }
    }
}
else {
    $sql = "SELECT *
              FROM cars where status=1;";
    $result = $db->query($sql);
    while ($row = $result->fetch_assoc()) {
        $carArray[]= $row['image'];
        $cars[]= $row['carid'];

    }
}
if (count($cars) == 0) {
    echo "<h1 class='asd'>No result Found!</h1>";
}
else{foreach ($cars as $value) {
    if (isset($_POST["$value"])){
        $idValue = "car".$value;
        $_SESSION["carid"] = $value;
        $_SESSION["startdate"] =$start;
        $_SESSION["enddate"] =$end;
        $sql = "UPDATE cars SET reserve ='0' WHERE carid = $value";
        if (mysqli_query($db, $sql)) {
        } else {
            echo "Error updating record: " . mysqli_error($db);
        }
        header("location:carRental.php");
    }
}
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        .asd{
            position:absolute;
            top:50%;
            left:55%;
        }
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
            background-color: rgba(255, 255, 255, 0.7);
            text-align: center;
            width: 30%;
            height: 60%;
            padding: 20px;
            border:solid 5px black;
            position: absolute;
            top: 25%;
            left: 1%;
        }

        .catalog{
            width: 60%;
            height: 65%;
            background-color: rgba(255, 255, 255, 0.7);
            overflow-y: scroll;
            border:black solid 5px;
            position: absolute;
            top: 25%;
            left: 35%;
        }
        .catalog img{
            width:240px;
            height:150px;
        }
        .catalog input{
            background-color:red;
            border-color: black;
            height: 15%;
            width:20%;
            top:10%;
            padding: 10px;
            font-size: 25px;
            color: black;
            float: right;
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
        @media only screen and (max-width: 1200px) {
            [class="catalog"]{
                top: 600px;
                float: left;
                width: 90%;
                left: 1%;
            }
            .catalog input{
                height: 5%;
                width:15%;
            }
            .asd{
                top:800px;
                left:200px;
            }
            .graySquare{
                top: 100px;
                float: left;
                width: 90%;
                height: 400px;
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
        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }
        }
        .selections{
            width: 200px;
            font-size: 1vw;
            color: black;
            border-style: solid;
            border-color: black;
        }
        .graySquare input{
            padding: 20px;
            width: 200px;
            font-family: monospace;
            font-size: 1vw;
            color: black;

        }
        .graySquare h1{
            font-size: 25px;
            font-family: monospace;
        }
    </style>
</head>
<body>
<div class="navbar">
    <a class="fa fa-home" href="userMainPage.php"
       style="color:red"> Home</a>
</div>
<div class="graySquare">
    <form action="#" method="post">
    <h1>Options</h1>
        <p id="carBrand">Brand:
            <select class="selections" id="brands" name = "brand">
                <option value="All cars">All cars</option>
            </select>
        </p>
        <p>Start Date:
            <input style="width:175px; height:10px;" type="date" name="startdate" value="">
        </p>
        <p>End Date:
            <input style="width:175px; height:10px;" type="date" name="enddate" value="">
        </p>
    <p id="CarCity">City:
        <select class="selections" name="City" id="City">
            <option value="All cities">All cities</option>
        </select>
        <p id="Type">Type:
            <select class="selections" name="Type" id="types">
                <option value="All types">All types</option>
            </select>
        <p style="color:red;font-size: 1.2vw;"><?php echo $count?> Cars found!</p>
    <input type="submit" style="margin-top:-5px;position:absolute;top:70%; right:30%;" name="submit" value="Search"></p>
    </form>
</div>
<div id="catalogs" class="catalog">
</div>

    <script>
    var cities = <?php echo json_encode($City); ?>;
    var cityselect = document.getElementById("CarCity");
    var citylist = document.getElementById("City");
    citylist.classList.add("selecter");
    for (var i = 0; i < cities.length; i++) {
    var option = document.createElement("option");
    option.value = cities[i];
    option.name = cities[i];
    option.text = cities[i];
    citylist.appendChild(option);
    }
    cityselect.appendChild(citylist);

    var carbrand = <?php echo json_encode($carBrand); ?>;
    var brandselect = document.getElementById("carBrand");
    var brandlist = document.getElementById("brands");
    brandlist.classList.add("selections");
    for (var i = 0; i < carbrand.length; i++) {
    var option = document.createElement("option");
    option.value = carbrand[i];
    option.name = carbrand[i];
    option.text = carbrand[i];
    brandlist.appendChild(option);
    }
    brandselect.appendChild(brandlist);
    var cartype = <?php echo json_encode($Type); ?>;
    var typeselect = document.getElementById("Type");
    var typelist = document.getElementById("types");
    typelist.classList.add("selections");
    for (var i = 0; i < cartype.length; i++) {
        var option = document.createElement("option");
        option.value = cartype[i];
        option.name = cartype[i];
        option.text = cartype[i];
        typelist.appendChild(option);
    }
    typeselect.appendChild(typelist);
    var cararray = <?php echo json_encode($carArray); ?>;
    var carids = <?php echo json_encode($cars); ?>;
    var element = document.getElementById("catalogs");
    var form = document.createElement("form");
    form.action = "#";
    form.method = "post";
    for (var i = 0; i < cararray.length; i++) {
    var tag = document.createElement("p");
    var img = document.createElement("img");
    var submit = document.createElement("input");
    submit.type = "submit";
    submit.name = carids[i];
    submit.value = "Rent";
    tag.name = carids[i];
    img.src = cararray[i];
    tag.id = carids[i];
    tag.appendChild(img);
    tag.appendChild(submit);
    form.appendChild(tag);
    }
    element.appendChild(form);
    </script>
</body>
</html>