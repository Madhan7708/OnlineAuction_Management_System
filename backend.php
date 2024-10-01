<?php
include("db.php");
if (isset($_POST['approve_user'])) {
    $apid = mysqli_real_escape_string($conn, $_POST['user_id']);
    $sql = "UPDATE login SET status ='2' WHERE id='$apid'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        mysqli_commit($conn);
        echo json_encode(['status' => 200]);
    }
    else {
        $res = [
            'status' => 500,
            'message' => 'Details Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}
