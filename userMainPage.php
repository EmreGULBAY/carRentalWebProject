<?php
        session_start();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
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

    body{
        animation: anime 20s infinite;
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
        background: rgba(255, 255, 255, 0.7) fixed center center;
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
        background: rgba(255, 255, 255, 0.7) fixed center center;
        max-width: 100%;
        background-size:contain;
        padding:20px;
        text-decoration: none;
    }
    #Comment {
        position: absolute;
        display: none;
        width: 35%;
        height: 40%;
        top: 30%;
        left: 40%;
        margin: 10px;
        border:solid black 5px;
        background: rgba(255, 255, 255, 0.7) fixed center center;
        max-width: 100%;
        background-size:contain;
        padding:20px;
        text-decoration: none;
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
    #Profile{
        position:absolute;
        width: 12%;
        height: 30%;
        background-color: rgba(255,255,255,0.7);
        border:solid black 5px;
        display:none;
        left:80%;
        top:12%;
        padding: 20px;
        border-radius: 20px;
    }
    #ChangePass{
        position: relative;
        display: none;
        width:30%;
        height: 40%;
        top: 10%;
        left: 45%;
        margin: 10px;
        border:solid black 5px;
        background: rgba(255, 255, 255, 0.7) fixed center center;
        max-width: 100%;
        background-size:contain;
        padding:20px;
    }
    #Wallet{
        position: relative;
        display: none;
        width:30%;
        height: 60%;
        top: 10%;
        left: 45%;
        margin: 10px;
        border:solid black 5px;
        background: rgba(255, 255, 255, 0.7) fixed center center;
        max-width: 100%;
        background-size:contain;
        padding:20px;
    }
    .closeButton2{
        position:absolute;
        top:3%;
        left:92%;
        background:rgba(0,0,0,0);
        color:black;
        border:none;
    }
    .closeButton2:hover{
        background: red;
        color:white;
    }
    .closeButton1{
        position:absolute;
        top:3%;
        left:92%;
        background:rgba(0,0,0,0);
        color:black;
        border:none;
    }
    .closeButton1:hover{
        background: red;
        color:white;
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
    .advert{
        font-size:2vw;
    }
    #advertisement{
        position: absolute;
        display: inline-block;
        width:25%;
        height: 20%;
        top: 60%;
        left: 5%;
        margin: 10px;
        border:solid black 5px;
        background: rgba(255, 255, 255, 0.7) fixed center center;
        max-width: 100%;
        background-size:contain;
        padding:20px;
    }
    #advertisement2{
        position: absolute;
        display: inline-block;
        width:25%;
        height: 20%;
        top: 30%;
        left: 5%;
        margin: 10px;
        border:solid black 5px;
        background: rgba(255, 255, 255, 0.7) fixed center center;
        max-width: 100%;
        background-size:contain;
        padding:20px;
    }
    .but{
        width:75%;
        padding: 5px 10px;
    }
    @media screen and (max-width: 1400px) {
        .closeButton2{
            left:45%;
        }
        .navbar a{
            padding:10px 10px;
            font-size:3vw;
        }
        #Contact{
            height:30%;
        }

        #Info{
            height:25%;
        }
        #Wallet{
            height:65%;
        }
        #ChangePass{
            height:50%;
        }
        #Profile{
            left:80%;
            height:35%;

        }
        #advertisement{
            height:15%;
        }
        #advertisement2{
            height:15%;
        }
        .col-25, .col-75 {
            width: 100%;
            margin-top: 0;
        }
    }
    @media screen and (max-width: 900px) {
        .closeButton2{
            left:45%;
        }
        .navbar a{
            padding:10px 10px;
            font-size:4vw;
        }
        #Contact{
            height:5%;
        }
        #Info{
            height:5%;
        }
        #Wallet{
            height:65%;
        }
        #advertisement{
            height:20%;
        }
        #ChangePass{
            height:60%;
        }
        #advertisement2{
            height:20%;
        }
        .col-25, .col-75{
            width: 100%;
            margin-top: 0;
        }
        .advert{
            font-size:3vw;
        }
        #Profile{
            left:70%;
            height:25%;
        }
    }


</style>

<html lang="en">
<body>

<div class="navbar">
    <a class="fa fa-home" onclick="closeAll()" href="userMainPage.php"
       style="color:red"> Home</a>
    <script>
        function closeAll(){
            closeInfo();
            closeContact();
        }
    </script>
    <a class="fa fa-book" onclick="openInfo()" style="position:absolute;left:20%;text-decoration: none;" href="#Info"> About</a>
    <script>
        function closeAdv(){
            document.getElementById("advertisement").style.display="none";
            document.getElementById("advertisement2").style.display="none";
        }
        function openAdv(){
            document.getElementById("advertisement").style.display="block";
            document.getElementById("advertisement2").style.display="block";
        }
        function openInfo() {
            document.getElementById("Info").style.display = "block";
            closeContact();
            closeChange();
            closeProfile();
            closeWallet();
            closeAdv();
        }
        function closeInfo() {
            document.getElementById("Info").style.display = "none";
            openAdv();
        }
    </script>
    <a class= "fa fa-phone" onclick="openContact()" style="position:absolute;left:40%;text-decoration: none;"href="#contact"> Contact</a>
    <script>
        function openContact() {
            document.getElementById("Contact").style.display = "block";
            closeInfo();
            closeChange();
            closeProfile();
            closeWallet();
            closeAdv();
        }
        function closeContact() {
            document.getElementById("Contact").style.display = "none";
            openAdv();
        }
    </script>
    <a class="fa fa-car" href="userRentCar.php" style="position: absolute;left:60%;text-decoration: none;">Rent</a>
    <a class="fa fa-address-card" onclick="openProfile()" href="#profile" style="position:absolute;left:80%;text-decoration: none;">Profile</a>
    <script>
        function openProfile(){
            document.getElementById("Profile").style.display="block";
            closeAll();
            closeAdv();
        }
        function closeProfile(){
            document.getElementById("Profile").style.display="none";
            openAdv();
        }
        function openChange(){
            document.getElementById("ChangePass").style.display="block";
            closeContact();
            closeInfo();
            closeWallet();
            closeAdv();
        }
        function closeChange(){
            document.getElementById("ChangePass").style.display="none";
        }
        function openWallet(){
            document.getElementById("Wallet").style.display="block";
            closeContact();
            closeInfo();
            closeChange();
            closeAdv();
        }
        function closeWallet(){
            document.getElementById("Wallet").style.display="none";
        }
        function onComment(){
            document.getElementById("Comment").style.display="block";
            closeContact();
            closeInfo();
        }
        function closeComment(){
            document.getElementById("Comment").style.display="none";
        }
    </script>
</div>
<div id="Profile" onclick="closeProfile()">
    <?php
    echo $_SESSION['username'];
    ?>
    <br><br>
    <?php
    $db = mysqli_connect('localhost', 'root', '', 'web');
    $username=$_SESSION['username'];
    $id= "SELECT id FROM users WHERE username='$username'";
    $result2=mysqli_query($db,$id);
    $result3=mysqli_fetch_assoc($result2);
    $userID=$result3['id'];
    $query= "SELECT amount FROM userWallet WHERE id=$userID";
    $resultQuery=mysqli_query($db,$query);
    $resultQuery2=mysqli_fetch_assoc($resultQuery);
    $userAmount=$resultQuery2['amount'];
    echo $userAmount;
    $_SESSION['id'] = $userID;
    ?>
    <form>
        <div class="row">
            <input class="but" type="submit" value="Rents" formaction="userRents.php" style="position: absolute;top:35%;font-size:1vw;">
        </div>
        <div class="row">
            <input class="but" type="submit" value="Add Amount" onclick="openWallet()" style="position: absolute;top:47%;font-size:1vw;">
        </div>
        <div class="row">
            <input class="but" type="submit" value="Change Password" onclick="openChange()" style="position: absolute;top:60%;font-size:1vw;">
        </div>
        <div class="row">
            <input class="but" type="submit" value="Sign Out" formaction="firstLogin.php" style="position: absolute;top:73%;font-size:1vw;">
        </div>
    </form>
</div>
<div id="ChangePass">
    <form method="post" >
        <div class="row">
            <div class="col-25">
                <label for="passw">OLD PASSWORD</label>
            </div>
            <div class="col-75">
                <input class="inputs" type="password" id="passw" name="oldp">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="newp1">NEW PASSWORD</label>
            </div>
            <div class="col-75">
                <input class="inputs" type="password" id="newp1" name="newp">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="newp2">NEW PASSWORD</label>
            </div>
            <div class="col-75">
                <input class="inputs" type="password" id="newp2" name="newp2">
            </div>
        </div>
        <div class="row">
            <br>
            <input type="submit" value="Save"  name="Save">
        </div>
        <div class="row">
            <br>
            <input type="submit" value="X" onclick="closeChange()" class="closeButton2">
        </div>
    </form>
    <?php
    if(isset($_POST['Save'])) {
        $oldPass = $_POST['oldp'];
        $newPass = $_POST['newp'];
        $newPass2 = $_POST['newp2'];
        $query3 = "SELECT * FROM users where id=$userID";
        $resultQuery3 = mysqli_query($db, $query3);
        $resultQuery4 = mysqli_fetch_assoc($resultQuery3);
        $userPass = $resultQuery4['password'];
        $password = md5($oldPass);
        $query4 = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query4);
        if (mysqli_num_rows($results) == 0){
            echo "<script> alert('Password Mismatch!')</script>";
        }
        else if($newPass!=$newPass2){
            echo "<script> alert('The two passwords are not same!')</script>";
        }
        else{
            $newPass=md5($newPass);
            $query5="UPDATE users set password='$newPass' where id=$userID";
            mysqli_query($db,$query5);
        }
    }
    ?>
</div>
<?php

?>
<div id="Wallet">
    <?php
    if(isset($_POST['Save2'])){
        $quer="SELECT * FROM userWallet where id=$userID";
        $resultQuery5 = mysqli_query($db, $quer);
        $resultQuery6 = mysqli_fetch_assoc($resultQuery5);
        $userAmount = $resultQuery6['amount'];
        $newAmount=$_POST['amount'];
        $userAmount=$userAmount+$newAmount;
        $q="update userWallet set amount='$userAmount' where id=$userID";
        mysqli_query($db,$q);
    }
    ?>
    <form method="post" >
        <div class="row">
            <div class="col-25">
                <label for="cardNo">Card No</label>
            </div>
            <div class="col-75">
                <input class="inputs" type="text" id="cardNo" name="cardNum" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">Name</label>
            </div>
            <div class="col-75">
                <input class="inputs" type="text" id="fname" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="pvc">PVC</label>
            </div>
            <div class="col-75">
                <input class="inputs" type="password" id="pvc" required>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="amount">Amount</label>
            </div>
            <div class="col-75">
                <input class="inputs" type="text" id="amount" name="amount" required>
            </div>
        </div>
        <div class="row">
            <br>
            <input type="submit" value="Save" name="Save2">
        </div>
        <div class="row">
            <br>
            <input type="submit" value="X" onclick="closeWallet()" class="closeButton2" >
        </div>
    </form>

</div>


<div id="Info" onclick="closeInfo()">
    <div>
        <h1 style="text-align: center;font-size: 3vw;">Rent a Car</h1>
        <p  style=" position:absolute;left:10px;font-size: 2vw;">This is a car rental website.You can rent a car online.</p>
    </div>
</div>
<div id="Contact">
    <div>
        <?php
        $id=$_SESSION['id'];
            if(isset($_POST['comment'])){
                $comment=$_POST['com'];
                $sql="insert into usercomment(id,comment)values('$id','$comment')";
                mysqli_query($db,$sql);
            }

        ?>
        <h2 style="font-size: 3vw;">Our connection addresses</h2>
        <a class="fa fa-facebook" style="font-size: 3vw;
         color:darkblue" href="https://www.facebook.com/">
            Facebook</a>
        <br>
        <br>
        <a class="fa fa-twitter" style="font-size: 3vw;
         color:cornflowerblue" href="https://www.twitter.com/" >
            Twitter</a>
        <br><br>
    <form method="post">
        <input class="inputs"  type="text" placeholder="enter your comment" name="com">
        <input value="comment"  type="submit" placeholder="enter your comment" name="comment">
    </form>
        <input type="submit" onclick="closeContact()" class="closeButton1" value="X">
    </div>
</div>
<div id="advertisement">
    <h2 class="advert">You can now filter for car types!</h2>
</div>
<div id="advertisement2" >
    <h2 class="advert">We have brand-new cars now on our filo and waiting four you!</h2>
</div>
<div id="Comment">
<form method="post">

</form>
</div>
</body>
</html>