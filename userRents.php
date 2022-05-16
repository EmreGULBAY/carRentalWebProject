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
        height: 40%;
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
    .but{
        width:75%;
        padding: 5px 10px;
    }
    .Rents{
        position: absolute;
        display: block;
        width:30%;
        height: 40%;
        top: 30%;
        left: 10%;
        margin: 10px;
        border:solid black 5px;
        background: rgba(255, 255, 255, 0.7) fixed center center;
        max-width: 100%;
        background-size:contain;
        padding:20px;
        overflow-y: scroll;
    }
    .CurrentRents{
        position: absolute;
        display: block;
        width:30%;
        height: 40%;
        top: 30%;
        left: 50%;
        margin: 10px;
        border:solid black 5px;
        background: rgba(255, 255, 255, 0.7) fixed center center;
        max-width: 100%;
        background-size:contain;
        padding:20px;
        overflow-y: scroll;
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
    <a class="fa fa-car" href="userRentCar.html" style="position: absolute;left:60%;text-decoration: none;">Rent</a>
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
    </script>
</div>
<?php


?>
<div id="Profile" onclick="closeProfile()">
    <?php  if (isset($_SESSION['username'])) : ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    <?php endif ?>
    <p style="position:absolute;left:10px;font-size:2vw; ">Wallet : X</p>
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
    <form>
        <div class="row">
            <div class="col-25">
                <label for="passw">OLD PASSWORD</label>
            </div>
            <div class="col-75">
                <input class="inputs" type="password" id="passw">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="newp1">NEW PASSWORD</label>
            </div>
            <div class="col-75">
                <input class="inputs" type="password" id="newp1">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="newp2">NEW PASSWORD</label>
            </div>
            <div class="col-75">
                <input class="inputs" type="password" id="newp2">
            </div>
        </div>
        <div class="row">
            <br>
            <input type="submit" value="Save" onclick="closeChange()">
        </div>
        <div class="row">
            <br>
            <input type="submit" value="X" onclick="closeChange()" class="closeButton2">
        </div>
    </form>
</div>
</form>
</div>
<div id="Wallet">
    <form>
        <div class="row">
            <div class="col-25">
                <label for="cardNo">Card No</label>
            </div>
            <div class="col-75">
                <input class="inputs" type="text" id="cardNo">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">Name</label>
            </div>
            <div class="col-75">
                <input class="inputs" type="text" id="fname">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="date">Date</label>
            </div>
            <div class="col-75">
                <input class="inputs" type="text" id="date">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="pvc">PVC</label>
            </div>
            <div class="col-75">
                <input class="inputs" type="password" id="pvc">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="amount">Amount</label>
            </div>
            <div class="col-75">
                <input class="inputs" type="text" id="amount">
            </div>
        </div>
        <div class="row">
            <br>
            <input type="submit" value="Save" onclick="closeWallet()">
        </div>
        <div class="row">
            <br>
            <input type="submit" value="X" onclick="closeWallet()" class="closeButton2">
        </div>
    </form>
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
        <a class="fa fa-facebook" style="font-size: 3vw;
         color:darkblue" href="https://www.facebook.com/">
            Facebook</a>
        <br>
        <br>
        <a class="fa fa-twitter" style="font-size: 3vw;
         color:cornflowerblue" href="https://www.twitter.com/" >
            Twitter</a>
    </div>
</div>
<div class="Rents">
    <h1 style="position:absolute;left:30%;font-size:2vW;">Previous Rents</h1>
</div>
<div class="CurrentRents">
    <h1 style="position:absolute;left:30%;font-size:2vW;">Active Rents</h1>
</div>
</body>
</html>