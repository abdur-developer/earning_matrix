<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="card p-2 m-2">

        <?php
        $sql = "SELECT * FROM deposit WHERE user_id = $sessionId";
        $query = mysqli_query($conn, $sql);
        $total_row = mysqli_num_rows($query);
        if ($total_row == 0) {
            echo "<div class='alert alert-danger' role='alert'>You don't have any tickets, buy tickets and win bonus..!</div>";
        } else { ?>
            
            <div class="history-x rounded p-2 m-1 small">
                <div class="row small text-center">
                    <div class="col-2">Sl</div>
                    <div class="col-3">T. Token</div>
                    <div class="col-3">Result</div>
                    <div class="col-4">Date</div>
                </div>
            </div>
            <?php
            $x = 0;
            while ($row = mysqli_fetch_array($query)) {
                $x++;
                $token = $row['t_token'];
                $result = $row['result'];
                $time = $row['time'];

                ?>
                <a href="../lottary/status.php?usudcfiowedwgwcsodcds8fver=sgdfu&grfd=<?= $token ?>&iufvdgufivgo=sudcvdofgscvdf">
                    <div class="history rounded p-2 m-1 small">
                        <div class="row small text-center">
                            <div class="col-2">
                                <?= $x; ?>
                            </div>
                            <div class="col-3">
                                <?= $token; ?>
                            </div>
                            <div class="col-3">
                                <?= $result; ?>
                            </div>
                            <div class="col-4">
                                <?= $time; ?>
                            </div>
                        </div>
                    </div>
                </a>
            <?php }
        }
        ?>



    </div>
</body>

</html> -->