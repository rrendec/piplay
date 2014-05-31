<?php

require_once 'TemplateSigmaForm.php';
require_once 'RadioListRequest.php';

class RadioListForm extends TemplateSigmaForm {
    public function createRequest() {
        return new RadioListRequest();
    }

    public function parse() {
        foreach ($this->request->data as $radio) {
            $this->template->setVariable('name', $radio->getName());
            $this->template->setVariable('id', $radio->getId());
            $this->template->parse('radio');
        }
    }
}

// vim: ts=4 sw=4 et
