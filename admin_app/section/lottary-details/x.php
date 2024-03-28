<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giveaway Winner Selection</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .box{
            width: 50%;
            margin: 0 auto;
            padding:30px;
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
            font-size: 2em;
            background: #6c9dc9;
            color: #fff;
            cursor: pointer;
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Giveaway Winner Selection</h2>
        <div id="odometer" class="odometer box">0</div>
        <div class="btn-winner box" onclick="getWinner();">Get Winner</div>
        <div class="card">
            <div class="card-body">
                <h4>Participants:</h4>
                <ul class="participant-list">
                    <!-- PHP script to display participants -->
                    <?php
                    
                    require "../../../includes/dbconnect.php";
                    // Your MySQL database connection code goes here
                    
                    // Query to select all participants from your database table
                    $query = "SELECT * FROM lot_ticket";
                    // Execute the query and fetch the result
                    $result = mysqli_query($conn, $query);
                    // Display each participant's details
                    while ($participant = mysqli_fetch_assoc($result)) {
                        echo "<li>Name: " . $participant['name'] . " | Email: " . $participant['email'] . "</li>";
                        // Flush output buffer to immediately display in the browser
                        ob_flush();
                        flush();
                        // Wait for 1 second (1000 milliseconds)
                        usleep(1000000);
                    }
                    ?>
                </ul>
                <hr>
                <!-- PHP script to select a random winner -->
                <?php
                // Query to select a random winner from your database table
                $query = "SELECT * FROM lot_ticket ORDER BY RAND() LIMIT 1";
                // Execute the query and fetch the result
                $result = mysqli_query($conn, $query);
                $winner = mysqli_fetch_assoc($result);
                // Display the winner's details
                echo "<h4>The winner is:</h4>";
                echo "<p>Name: " . $winner['name'] . "</p>";
                echo "<p>Email: " . $winner['email'] . "</p>";
                ?>
            </div>
        </div>
    </div>
    <script type="text/javascript">

function generateRandom(maxLimit = 100){
  let rand = Math.random() * maxLimit;
  rand = Math.floor(rand);
  return rand;
}

function getWinner(){
  document.getElementsByClassName('btn-winner')[0].innerHTML = 'Please wait for the result ....';
  interval = setInterval(function(){
      document.getElementById('odometer').innerHTML = generateRandom();
  },100);

  setTimeout(function(){
    clearInterval(interval);
    document.getElementsByClassName('btn-winner')[0].innerHTML = 'Get Winner';
  },3000);
}


</script>
</body>
</html>
