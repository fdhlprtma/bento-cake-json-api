<?php
class Response {
    public static function success($data, $message = "Success") {
        echo json_encode([
            "status" => "success",
            "message" => $message,
            "data" => $data
        ], JSON_PRETTY_PRINT);
        exit;
    }

    public static function error($message = "Error", $code = 400) {
        http_response_code($code);
        echo json_encode([
            "status" => "error",
            "message" => $message
        ], JSON_PRETTY_PRINT);
        exit;
    }
}
?>
