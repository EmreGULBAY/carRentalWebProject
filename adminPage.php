<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
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
        #catalog{
            width: 60%;
            height: 65%;
            background-color: rgba(255, 255, 255, 0.5);
            border:black solid 5px;
            position: absolute;
            top: 25%;
            left: 20%;
        }
        #Sure{
            width: 25%;
            height: 25%;
            background-color: rgba(255, 255, 255, 0.5);
            border:black solid 5px;
            position: absolute;
            display: none;
            top: 25%;
            left: 20%;
        }
        .inputs{
            width: 70%;
            padding: 10px;
            position:absolute;
            top:15%;
            left:15%;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;

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
        .add{
            position:absolute;
            top:50%;
            left:5%;
            font-size: 2vw;
            color:black;
            background:red;
            border:2px solid black;
        }
        @media only screen and (max-width: 1200px) {
            #catalog{
                float: left;
                width: 90%;
                left: 5%;
            }
            .add{
                top:95%;
                left:45%;
            }
        }
    </style>
</head>
<body>
<div class="navbar">
    <a  href="firstLogin.php"
       style="color:red;text-decoration: none;left:45%;position: absolute"> Sign Out</a>
</div>
<form>
<div class="row">
    <div class="col-75">
        <input class="inputs" type="text" id="name" placeholder="Enter Car ID">
    </div>
</div>
    <div class="row">
        <div class="col-75">
            <input class="add" type="submit" id="asd" value="Add Car" formaction="adminAddCar.php">
        </div>
    </div>
    </form>
<div id="Sure">

</div>
<div  id="catalog">
    <script>
        function openSure(){
            document.getElementById("catalog").style.display="none";
            document.getElementById("Sure").style.display="block";
        }
        function closeSure(){
            document.getElementById("catalog").style.display="block";
            document.getElementById("Sure").style.display="none";
        }
    </script>
    <form>
        <div class="row">
            <img src="araba1.jpg"  style="width:210px; height:130px;position:absolute;top:5%;">
            <input type="submit" value="Delete" style="position:absolute;left:90%;top:5%;background: red
;color:white;">
            <input type="submit" value="Cancel Reservation" style="position:absolute;left:60%;top:5%;background: green
;color:white;">
        </div>
    </form>
    <form>
        <div class="row" style="background: red">
            <img src="araba2.jpg"  style="width:210px; height:130px;position:absolute;top:35%;">
            <input type="submit" value="Delete" style="position:absolute;left:90%;top:40%;background: red
;color:white;">
            <input type="submit" value="Cancel Reservation"
                   style="position:absolute;left:60%;top:40%;background: green
;color:white;">
        </div>
    </form>
    <form>
        <div class="row">
            <img src="araba3.jpg"  style="width:210px; height:130px;position:absolute;top:65%;">
            <input type="submit" value="Delete"  style="position:absolute;left:90%;top:70%;background: red
;color:white;">
            <input type="submit" value="Cancel Reservation" style="position:absolute;left:60%;top:70%;background: green
;color:white;">
        </div>
    </form>

</div>
</body>
</html>