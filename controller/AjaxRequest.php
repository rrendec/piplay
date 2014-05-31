<?php

require_once 'BaseRequest.php';
require_once 'Mplayer.php';

class AjaxRequest extends BaseRequest {
    public function dispatch() {
		$radio = RadioQuery::create()->findPK($_POST['id']);
		$mplayer = new Mplayer();
		$mplayer->play($radio->getUrl());
        $this->response = true;
    }
}

// vim: ts=4 sw=4 et
