<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    
</head>
<body>
    <div class="container">
        <div class="header d-flex justify-content-center mt-3">
            <img src="../assets/images/task.jpg" class="img-fluid m-2" height="30px" width="30px">
            <h3 class="m-2 text-info">Need Active</h3>
        </div>
        <div class="container-fluid">
            <img src="../assets/images/sorry.jpg" class="img-fluid d-block m-auto mt-4" width="80px" height="80px">
            <div class="text-danger mt-5">
                <p class="text-center small"><b>
                    আমরা আন্তরিক ভাবে দুঃখিত ! আমাদের Company তে কাজ করতে হলে আপনাকে অবশ্যই আপনার অ্যাকাউন্টটিকে একটিভ করতে হবে  
                </b></p>
                <div class="row justify-content-center text-center mt-5">
                    <div class="col-6">
                        <button class="btn btn-success text-white" onclick="goActive()"><b>Active now</b></button>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-info text-ligth" onclick="goCare()"><b>Customer care</b></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function goActive(){
          window.location.href = "../home/?q=active";
        }
        function goCare(){
          window.location.href = "../customer-care/";
        }
      </script>
</body>
</html>