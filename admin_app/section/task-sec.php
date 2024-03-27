<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='../../bootstrap/css/bootstrap.min.css' rel='stylesheet'>
    <link href="../style.css" rel="stylesheet" />
    <title>Task Section</title>
</head>

<body>
    <div class="header bg-primary text-white">
        <h1 class="py-2 text-center">Task Section</h1>
    </div>
    <div class="container p-3">


        <div class="card p-2 mb-3" style="background-color: deeppink;">
            <div class="row card-body">
                <div class="user-sec text-white col-9">
                    <h2 class="card-title text-left">All Task</h2>
                    <p class="card-text text-left">
                        earning matrix<a href="task-details/" class="stretched-link"></a>
                    </p>

                </div>
                <div class="col-3" style='color:#ffffff font-size: 70px;'>
                    <img src="../arrow.png" alt="" class="color-change-img">
                </div>
            </div>

        </div>

        <div class="card bg-warning p-2 mb-3">
            <div class="row card-body">
                <div class="user-sec text-black col-9">
                    <h2 class="card-title text-left">Pending job</h2>
                    <p class="card-text text-left">earning matrix
                        <a href="task-details/submit.php?type" class="stretched-link"></a>
                    </p>
                </div>
                <div class="col-3" style='color:#ffffff font-size: 70px;'>
                    <img src="../arrow.png" alt="" class="color-img">
                </div>
            </div>

        </div>

        <div class="card bg-success p-2 mb-3">
            <div class="row card-body">
                <div class="user-sec text-white col-9">
                    <h2 class="card-title text-left">All submited job</h2>
                    <p class="card-text text-left">earning matrix
                        <a href="task-details/submit.php" class="stretched-link"></a>
                    </p>
                </div>
                <div class="col-3" style='color:#ffffff font-size: 70px;'>
                    <img src="../arrow.png" alt="" class="color-change-img">
                </div>
            </div>

        </div>

</body>

</html>