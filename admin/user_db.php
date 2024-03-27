<?php
if(isset($_REQUEST['password']) && $_REQUEST['password'] == "abdur"){
    require "../includes/dbconnect.php";
    $section = $_REQUEST['section'];
    $sql = "";
    switch($section){
        case "all":
            if(isset($_REQUEST['email'])){
                $email = $_REQUEST['email'];
                $sql = "SELECT * FROM users WHERE email = '$email' ORDER BY id DESC";
            }else{
                $sql = "SELECT * FROM users ORDER BY id DESC";
            }
            break;
        case "act":
            $sql = "SELECT * FROM users WHERE status = 'Approved' ORDER BY id DESC";
            break;
        case "pen":
            $sql = "SELECT * FROM users WHERE status = 'Pending' ORDER BY id DESC";
            break;
        case "ban":
            $sql = "SELECT * FROM users WHERE status = 'Ban' ORDER BY id DESC";
            break;

    }
    $query = mysqli_query($conn, $sql);

    $data = [];
    while ($row = $query->fetch_assoc()) {
        $data[] = $row;
    }
    // Convert data to JSON format
    $json_data = json_encode($data, JSON_PRETTY_PRINT);

    // Output the JSON data
    header('Content-Type: application/json');
    echo $json_data;
}
?>