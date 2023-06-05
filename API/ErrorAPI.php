<?php

class ErrorAPI extends Exception {

    public function fetchError() {
        http_response_code(400);
        echo $this->message;
        exit();
    }
}