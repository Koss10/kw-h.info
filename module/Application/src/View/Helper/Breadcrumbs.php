<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Breadcrumbs extends AbstractHelper
{
    private $items = [];
    
    function __construct($items) {
        $this->items = $items;
    }
    
    function getItems() {
        return $this->items;
    }

    function setItems($items) {
        $this->items = $items;
    }

    public function render()
    {
        if(count($this->items) == 0)
        {
            return ''; 
        }
        $result = '<ol class="breadcrumb">';
        $itemCount = count($this->items);
        $itemNum = 1;
        
        foreach ($this->items as $label=>$link)
        {
            $isActive = ($itemNum == $itemCount ? TRUE:FALSE);
            $result .= $this->renderItem($label, $link, $isActive);
            $itemNum++;
        }
        $result .= '</ol>';
        
        return $result;
    }
    
    public function renderItem($label, $link, $isActive)
    {
        $escapeHtml = $this->getView()->plugin('escapeHtml');
        $result = $isActive ? '<li class="active>' : '<li>';
        
        if(! $isActive)
        {
            $result .= '<a href="' . $escapeHtml . '">' . $escapeHtml($label) . '</a>';
        } else {
            $result .= $escapeHtml($label);
        }
        $result .= '<li>';
        
        return $result;
    }
}