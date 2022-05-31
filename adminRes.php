<?php
session_start();
?>
<?php
$db = mysqli_connect("localhost", "root", "", "web");
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$pastRes=[];
$city=$_SESSION['city'];
$sql = "SELECT r.*
          FROM reservation r,cars c
          WHERE c.city='$city' AND r.carid=c.carid";
$result = $db->query($sql);
$result3=mysqli_query($db,$sql);
if(mysqli_fetch_assoc($result3)!=null){
    $resids=mysqli_fetch_assoc($result3);
    if($resids!=null)
        $resid=$resids['reservationid'];
}
while ($row = $result->fetch_assoc()) {
    $start=$row['startdate'];
    $end=$row['enddate'];
    $cost=$row['cost'];
    $pastRes[]= $row['startdate']."   ".$row['enddate']."    ".$row['cost']."$";
}
?>
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
    .Rents{
        position: fixed;
        display: block;
        width:40%;
        height: 40%;
        top: 10%;
        left: 0%;
        margin: 10px;
        border:solid black 5px;
        background: rgba(255, 255, 255, 0.7) fixed center center;
        max-width: 100%;
        background-size:contain;
        padding:20px;
        overflow-y: scroll;
    }
</style>
<body>
<form method="post">
    <div class="Rents">
        <h1 id="pastdate" style="position:absolute;left:30%;font-size:2vW;">Previous Rents</h1>
    </div>
</form>

</body>
<script>
    var past = <?php echo json_encode($pastRes); ?>;
    var pastres = document.getElementById("pastdate");
    var futureres = document.getElementById("upcomingdate");
    for (var i = 0; i < past.length; i++) {
        var p = document.createElement("p");
        var text = document.createTextNode(past[i]);
        var close = document.createElement("input");
        p.style.fontSize = '20px';
        close.type = "submit";
        close.name = past[i];
        close.value = "Review";
        close.style.height = "20px";
        close.style.position="absolute";
        close.style.left="250px";
        close.formAction="userReview.php";
        p.appendChild(text);
        pastres.appendChild(p);
    }
</script>