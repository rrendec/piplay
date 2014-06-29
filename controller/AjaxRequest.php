<?php

require_once 'BaseRequest.php';
require_once 'Mplayer.php';

class AjaxRequest extends BaseRequest {
    public function dispatch() {
		$mplayer = new Mplayer();
        if ($_POST['action'] == 'Stop') {
			$mplayer->sendCmd(Mplayer::CMD_STOP);
			return;
		}
		$radio = RadioQuery::create()->findPK($_POST['id']);
		$mplayer->play($radio->getUrl());
        $this->response = true;
    }
}

// vim: ts=4 sw=4 et
