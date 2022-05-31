
<?php
$db = mysqli_connect("localhost", "root", "", "web");
$users=[];

$date=date("Y-m-d");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

else {
    $sql2 = "select sum(cost) as total,count(*) as num from reservation where datetime='$date'";
    $result=mysqli_query($db,$sql2);
    $results=mysqli_fetch_assoc($result);
    $income=$results['total'];
    $number=$results['num'];
    $sql = "SELECT *
              FROM users ";
    $result = $db->query($sql);
    while ($row = $result->fetch_assoc()) {
        $users[]= $row['id'];
        $usernames[] =$row['username'];
        $statuses[]=$row ['position'];
    }
}
foreach ($users as $value) {
    if (isset($_POST["$value"])){
        $sql = "select * from users where id='$value'";
        $result=mysqli_query($db,$sql);
        $result2=mysqli_fetch_assoc($result);
        $_SESSION['userid']=$value;
        header("Location:adminUserRent.php");
    }
}
$sql="select count(*) as x from users";
$result=mysqli_query($db,$sql);
$results=mysqli_fetch_assoc($result);
$count=$results['x'];
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
            width: 35%;
            height: 75%;
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
        #report{
            width: 25%;
            height: 30%;
            background-color: rgba(255, 255, 255, 0.7);
            overflow-y: scroll;
            border:black solid 5px;
            position: absolute;
            top: 25%;
            left: 5%;
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
        .add{
            position:absolute;
            top:15%;
            left:47%;
            font-size: 2vw;
            color:black;
            background:red;
            border:2px solid black;
        }
    </style>
</head>
<body>
<div class="navbar">

    <a class="fa fa-home" href="adminPage.php"
       style="color:red;text-decoration: none"> Home</a>
    <a  href="firstLogin.php"
        style="color:red;text-decoration: none;left:45%;position: absolute"> Sign Out</a>
</div>
<div class="navbar">
    <a  href="firstLogin.php"
        style="color:red;text-decoration: none;left:45%;position: absolute"> Sign Out</a>
</div>
<form>
    <div class="row">
        <div class="col-75">
            <input class="add" type="submit" id="asd" value="Add Car" formaction="adminAddCar.php">
        </div>
    </div>
</form>
    <div id="catalogs" class="catalog">
        <p style="position: absolute;left:40%;font-size: 1.5vw;color:red;"><?php echo $count?> Active users</p><br>
    </div>
<div id="report">
    <h1 style="position: absolute;left:40%;font-size: 1.5vw;color:red;">REPORT</h1>
    <br><br><br>
    <p style="font-size: 1.2vw;text-align: center"> <?php echo "Total ".$number."  cars booked today"?></p>
    <br>
    <p style="font-size: 1.2vw;text-align: center"><?php echo "Total income is ".$income."$"?></p>
</div>

    <script>
        var users = <?php echo json_encode($users); ?>;
        var status= <?php echo json_encode($statuses);?>;
        var username = <?php echo json_encode($usernames)?>;
        var element = document.getElementById("catalogs");
        var form = document.createElement("form");
        form.action = "#";
        form.method = "post";
        for (var i = 0; i < users.length; i++) {
            var p = document.createElement("p");
            var text = document.createTextNode(users[i]);
            var text2=document.createTextNode(status[i]);
            var text3=document.createTextNode(username[i]);
            var submit = document.createElement("input");
            var statuses = document.createElement("p");
            var positions = document.createElement("p");
            var usernames = document.createElement("p");
            submit.type = "submit";
            submit.name = users[i];
            submit.value = "reservations";
            p.name = users[i];
            p.id = users[i];
            statuses.appendChild(text2);
            statuses.style.position="relative";
            statuses.style.bottom="85px";
            statuses.style.left="300px";
            statuses.style.fontSize="40px";
            usernames.appendChild(text3);
            usernames.style.position="relative";
            usernames.style.bottom="175px";
            usernames.style.left="150px";
            usernames.style.fontSize="40px";
            p.appendChild(text);
            p.appendChild(submit);
            p.style.position="relative";
            p.style.fontSize="40px";
            form.appendChild(p);
            form.appendChild(statuses);
            form.appendChild(positions);
            form.appendChild(usernames);
        }
        element.appendChild(form);
    </script>
</body>
</html>