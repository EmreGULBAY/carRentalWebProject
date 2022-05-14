<?php include('server.php') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .back{
            background-image:url('araba1.jpg');
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment:fixed;
            background-size:cover;
            padding-left:8% ;
            padding-right:8%;
            max-width: 100%;
        }
        input[type=text]{
            width: 80%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }
        input[type=password]{
            width: 80%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }
        input[type=submit] {
            color: black;
            padding: 5px 10px;
            border: 2px solid black;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        #graySquare{
            position: relative;
            display: inline-block;
            width: 40%;
            height:80%;
            top: 10%;
            left: 10%;
            margin: 10px;
            border:solid black 5px;
            background: rgba(255, 255, 255, 0.5) fixed center center;
            max-width: 100%;
            background-size:contain;
            padding:20px;
        }
        #Info {
            position: relative;
            display: none;
            width: 40%;
            height: 33%;
            top: 20%;
            left: 10%;
            margin: 10px;
            border:solid black 5px;
            background: rgba(255, 255, 255, 0.5) fixed center center;
            max-width: 100%;
            background-size:contain;
            padding:20px;
            text-decoration: none;
        }
        #Contact {
            position: relative;
            display: none;
            width: 40%;
            height: 40%;
            top: 20%;
            left: 10%;
            margin: 10px;
            border:solid black 5px;
            background: rgba(255, 255, 255, 0.5) fixed center center;
            max-width: 100%;
            background-size:contain;
            padding:20px;
            text-decoration: none;
        }
        .navbar a {
            color: black;
            padding: 30px 60px;
            font-size: 2vw;
        }
        .navbar a:hover{
            background-color: aqua;
            color: red;
        }
        .navbar {
            float:right;
            overflow: hidden;
        }
        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }
        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        @media screen and (max-width: 1200px) {
            .navbar a{
                padding:5px 5px;
                font-size:2vw;
            }
            #Contact{
                height:30%;
            }
            #Info{
                font-size:4vw;
                height:20%;
            }
            #graySquare{
                height:100%;
                top:0%;
                right:20%;
            }
            .col-25, .col-75, input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>
</head>
<body class="back">
<script>
    function closeAll(){
        closeInfo();
        closeContact();
    }
    function closeGray(){
        document.getElementById("graySquare").style.display="none";
    }
    function openGray(){
        document.getElementById("graySquare").style.display="inline-block";
    }
    function openInfo() {
        document.getElementById("Info").style.display = "block";
        closeContact();
        closeGray();
    }
    function closeInfo() {
        document.getElementById("Info").style.display = "none";
        openGray();
    }
    function openContact() {
        document.getElementById("Contact").style.display = "block";
        closeInfo();
        closeGray();
    }
    function closeContact() {
        document.getElementById("Contact").style.display = "none";
        openGray();
    }
</script>
<div class="navbar">
    <a class="fa fa-home" onclick="closeAll()" href="#home" style="text-decoration:none;position:absolute;left:0%;"> Home</a>
    <a class="fa fa-book" onclick="openInfo()" href="#Info" style="text-decoration:none;"> About</a>
    <a class= "fa fa-phone" onclick="openContact()" href="#contact" style="
    text-decoration:none;"> Contact</a>
</div>
<div id="Info" onclick="closeInfo()">
    <div>
        <h1 style="text-align: center;font-size: 3vw;">Rent a Car</h1>
        <p  style=" position:absolute;left:10px;font-size: 2vw;">This is a car rental website.You can rent a car online.</p>
    </div>
</div>
<div id="Contact" onclick="closeContact()">
    <div>
        <h2 style="font-size: 3vw;">Our connection addresses</h2>
        <a class="fa fa-facebook" style="font-size: 2vw;
         color:darkblue" href="https://www.facebook.com/">
            Facebook</a>
        <br>
        <br>
        <a class="fa fa-twitter" style="font-size: 2vw;
         color:cornflowerblue" href="https://www.twitter.com/" >
            Twitter</a>
    </div>
</div>
<div id="graySquare">
    <form method="post" action="userSignupPage.php">
        <?php include('errors.php'); ?>
        <br><br><br><br><br>
        <div class="row">
            <div class="col-25">
                <label for="username">Username</label>
            </div>
            <div class="col-75">
                <input type="text" id="username" name="username">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="email">Email</label>
            </div>
            <div class="col-75">
                <input type="text" id="email" name="email">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="phone">Phone</label>
            </div>
            <div class="col-75">
                <input type="text" id="phone" name="phone">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="pass">Password</label>
            </div>
            <div class="col-75">
                <input type="password" id="pass" name="password1">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="pass2">Password Again</label>
            </div>
            <div class="col-75">
                <input type="password" id="pass2" name="password2">
            </div>
        </div>
        <div class="row">
            <br>
            <input type="submit" value="Save" name="save">
        </div>
        <p>
            Already a member? <a href="firstLogin.php">Sign in</a>
        </p>
    </form>
</div>

</body>
</html>