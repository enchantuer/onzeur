<?php

class ErrorAPI extends Exception {

    public function fetchError() {
        http_response_code($this->code);
        echo $this->message;
        exit();
    }
}