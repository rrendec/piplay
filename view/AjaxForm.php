<?php

require_once 'RequestDispatcher.php';
require_once 'AjaxRequest.php';

class AjaxForm extends RequestDispatcher {
    function createRequest() {
        return new AjaxRequest();
    }

    function write() {
        echo json_encode($this->request->response);
    }
}

// vim: ts=4 sw=4 et
