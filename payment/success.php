<?php
if(isset($_REQUEST['transactionId'])){
    echo 'transactionId : '.$_REQUEST['transactionId'].'<br>';
    echo 'paid_by : '.$_REQUEST['paid_by'].'<br>';
    echo 'paymentFee : '.$_REQUEST['paymentFee'].'<br>';
    echo 'success : '.$_REQUEST['success'].'<br>';
    echo 'paymentAmount : '.$_REQUEST['paymentAmount'].'<br>';
    echo 'p_type : '.$_REQUEST['p_type'].'<br>';
}

?>