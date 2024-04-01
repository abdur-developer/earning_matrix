
<?php

if(isset($_REQUEST['transactionId'])){
    echo 'transactionId : '.$_REQUEST['transactionId'].'<br>';
    echo 'paymentAmount : '.$_REQUEST['paymentAmount'].'<br>';
    echo 'paymentFee : '.$_REQUEST['paymentFee'].'<br>';
    echo 'success : '.$_REQUEST['success'].'<br>';
}

?>