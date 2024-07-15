<?php

require_once 'connection.php';

if (isset($_POST['code']) && isset($_POST['id'])) {
    $code = $_POST['code'];
    $accountId = $_POST['id'];

    $stmt = $con->prepare('SELECT v.* FROM vouchers v WHERE v.voucher_code = ? AND v.is_claimed = 0 LIMIT 1');
    $stmt->bind_param('s', $code);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($row['is_global'] == 1) {
            echo "valid";
        }

        if ($row['account_id'] == $accountId) {
            echo "valid";
        }
    } else {
        echo "invalid";
    }
}