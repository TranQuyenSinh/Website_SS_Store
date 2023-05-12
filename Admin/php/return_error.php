<?php
    function return_error($error) {
        http_response_code(400);
        echo $error;
        exit;
    }
?>