
<?php
$db = mysqli_connect("localhost", "root", "", "web");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$sql = "SELECT *
              FROM users;";
$result = $db->query($sql);
while ($row = $result->fetch_assoc()) {
    $userArray[] = $row['id'];
    $users[] = $row['username'];
}
$sql = "SELECT * from userwallet";
$result = $db ->query($sql);
while($row = $result->fetch_assoc()){
    $wallet[]= $row['amount'];
}
$sql = "SELECT * from users";
$result = $db ->query($sql);
while($row = $result->fetch_assoc()){
    $phones[]= $row['phone'];
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
    <a  href="firstLogin.php"
        style="color:red;text-decoration: none;left:45%;position: absolute"> Sign Out</a>
</div>
<div class="navbar">
    <a  href="Users.php"
        style="color:red;text-decoration: none;left:20%;position: absolute"> Users</a>
</div>
<form>
    <div class="row">
        <div class="col-75">
            <input class="add" type="submit" id="asd" value="Add Car" formaction="adminAddCar.php">
        </div>
    </div>
</form>
    <div id="catalogs" class="catalog">
    </div>

    <script>
        var userarray = <?php echo json_encode($userArray); ?>;
        var users = <?php echo json_encode($users); ?>;
        var wallet = <?php echo json_encode($wallet); ?>;
        var phones = <?php echo json_encode($phones); ?>;
        var element = document.getElementById("catalogs");
        var form = document.createElement("form");
        form.action = "#";
        form.method = "post";
        for (var i = 0; i < userarray.length; i++) {
            var p = document.createElement("p");
            var p2 = document.createElement("p");
            var p3 =document.createElement("p");
            var text = document.createTextNode(users[i]);
            var text2 = document.createTextNode(wallet[i]);
            var text3 = document.createTextNode(phones[i]);
            p.name = users[i];
            p.id = users[i];
            form.appendChild(p);
            form.appendChild(p2);
            form.appendChild(p3);
            p2.style.position="relative";
            p2.style.fontSize="40px";
            p2.style.left="150px"
            p2.style.top="-85px"
            p.appendChild(text);
            p.style.position="relative";
            p.style.fontSize="40px";
            p2.appendChild(text2);
            p3.style.position="relative";
            p3.style.fontSize="40px";
            p3.style.left="300px"
            p3.style.top="-170px"
            p3.appendChild(text3);
        }
        element.appendChild(form);
    </script>
</body>
</html>