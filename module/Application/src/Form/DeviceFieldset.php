<?php
namespace Application\Form;

use Zend\Form\Fieldset;
use Application\Model\Device;
use Zend\Hydrator\Reflection as ReflectionHydrator;

class DeviceFieldset extends Fieldset
{
    public function init() {
        $this->setHydrator(new ReflectionHydrator());
		$this->setObject(new Device('', '', '','', '', '','',''));
		
        $this->add([
            'type' => 'hidden',
            'name' => 'id',
        ]);

        $this->add([
            'type' => 'text',
            'name' => 'model',
            'options' => [
                'label' => 'Device Model',
            ],
        ]);
		
	$this->add([
            'type' => 'text',
            'name' => 'category',
            'options' => [
                'label' => 'Device Category',
            ],
        ]);
        
        $this->add([
            'type' => 'text',
            'name' => 'manufacturer',
            'options' => [
                'label' => 'Device manufacturer',
            ],
        ]);
        
        $this->add([
            'type' => 'text',
            'name' => 'power',
            'options' => [
                'label' => 'Power',
            ],
        ]);
        
        $this->add([
            'type' => 'text',
            'name' => 'release_date',
            'options' => [
                'label' => 'Date of release',
            ],
        ]);
        
        $this->add([
            'type' => 'text',
            'name' => 'property',
            'options' => [
                'label' => 'Property',
            ],
        ]);

        $this->add([
            'type' => 'textarea',
            'name' => 'description',
            'options' => [
                'label' => 'Description',
            ],
        ]);
    }
}

