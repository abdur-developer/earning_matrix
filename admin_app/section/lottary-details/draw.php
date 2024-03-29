<?php
if(isset($_GET['dfbdfuh'])){

}else{
    header("location: ../../../");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lottery Winner Selection</title>
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
    <style>
        body{
            text-align: center;
            justify-content: center;
            align-items: center;
        }
        #massage {
            text-align: center;
            display: none;
        }
        h3 {
            text-align: center;
        }
        .box{
            width: 50%;
            margin: 0 auto;
            padding:15px;
            text-align: center;
        }
        .odometer{
            font-size: 12em;
            background:#fff;
            border-radius:40px 40px 0 0;
            margin-top:50px;
            border-bottom: 2px solid #ddd;
        }
        .btn-winner{
            font-size: 1.5em;
            background-color: darkgreen;
            color: #fff;
            cursor: pointer;
            border-radius: 10px;
        }
        .btn-winner:hover {
            transition-duration: 0.1s;
            box-shadow:  0 0 18px rgba(255, 255, 255, 0.75);
            user-select: none;
        }
        .container {
            margin-top: 50px;
        }
        .participant-list {
            list-style-type: none;
            padding: 0;
        }
        .participant-list li {
            margin-bottom: 10px;
        }
        .confirmation-dialog {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .dialog-content {
            background-color: white;
            width: 300px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .buttons {
            text-align: right;
            margin-top: 20px;
        }

        .buttons button {
            padding: 8px 16px;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Lottery Winner Selection</h3>
        <div id="odometer" class="odometer box text-center">0</div>
        <p id="massage"><small>Please wait 30 seconds for find a winner...?</small></p>
        <div class="btn-winner box" onclick="getWinner();">Get Winner</div>
        <!-- <div class="card">
            <div class="card-body">
                <h4>Participants:</h4> 
                 <ul class="participant-list">
                     PHP script to display participants  -->
                    <?php
                    
                    require "../../../includes/dbconnect.php";
                    /*Your MySQL database connection code goes here
                    
                    Query to select all participants from your database table
                    $query = "SELECT * FROM lot_ticket";
                    Execute the query and fetch the result
                    $result = mysqli_query($conn, $query);
                    Display each participant's details
                    while ($participant = mysqli_fetch_assoc($result)) {
                        echo "<li>Name: " . $participant['name'] . " | Email: " . $participant['email'] . "</li>";
                        Flush output buffer to immediately display in the browser
                        ob_flush();
                        flush();
                        Wait for 1 second (1000 milliseconds)
                        usleep(1000000);
                    }*/
                    ?>
                <!-- </ul> -->
                <hr>
                <!-- PHP script to select a random winner -->
                <?php
                // Query to select a random winner from your database table
                $query = "SELECT * FROM lot_ticket ORDER BY RAND() LIMIT 1";
                // Execute the query and fetch the result
                $result = mysqli_query($conn, $query);
                $winner = mysqli_fetch_assoc($result);
                // Display the winner's details
                //echo "<h4>The winner is:</h4>";
                //echo "<p>Name: " . $winner['name'] . "</p>";
                //echo "<p>Email: " . $winner['email'] . "</p>";
                ?>
            <!-- </div>
        </div> -->
    </div>
    <div id="confirmationDialog" class="confirmation-dialog">
        <div class="dialog-content">
            <h4 class="text-center">Winner</h4>
            <p>Name : <?= $winner['name'] ?></p>
            <p>Email : <?= $winner['email'] ?></p>
            <div class="buttons">
                <button onclick="confirmAction()" class="btn btn-success">Confirm</button>
                <button onclick="closeConfirmation()" class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function openConfirmation() {
            document.getElementById('confirmationDialog').style.display = 'block';
        }

        function closeConfirmation() {
            document.getElementById('confirmationDialog').style.display = 'none';
        }

        function confirmAction() {
            closeConfirmation();
            window.location.href = "win.php?winner_id=<?= $winner['id'] ?>&lottary_id=<?= $winner['lottary'] ?>";
        }

        function generateRandom(maxLimit = 150){
        let rand = Math.random() * maxLimit;
        rand = Math.floor(rand);
        return rand;
        }

        function getWinner(){
        document.getElementsByClassName('btn-winner')[0].style.display = 'none';
        document.getElementById('massage').style.display = 'block';
        interval = setInterval(function(){
            document.getElementById('odometer').innerHTML = generateRandom();
        },100);
        
        setTimeout(function(){
            clearInterval(interval);
            openConfirmation();
            document.getElementById('massage').style.display = 'none';
            document.getElementsByClassName('btn-winner')[0].style.display = 'block';
        },3000);
        }


</script>
</body>
</html>
