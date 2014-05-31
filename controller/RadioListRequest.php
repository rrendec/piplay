<?php

require_once 'BaseRequest.php';

class RadioListRequest extends BaseRequest {
    public function dispatch() {
        $this->data = RadioQuery::create()->orderBySortKey()->find();
    }
}

// vim: ts=4 sw=4 et
