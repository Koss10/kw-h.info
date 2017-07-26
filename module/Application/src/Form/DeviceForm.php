<?php
namespace Application\Form;

use Zend\Form\Form;

class DeviceForm extends Form
{
    public function __construct() {
        $this->setAttribute('method', 'post');       
    }

    
    public function init() {
        $this->add([
            'name' => 'device',
            'type' => DeviceFieldset::class,
            'options' => [
                'use_as_base_fieldset' => TRUE,
            ],
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Insert new device',
            ],
        ]);
    }
}