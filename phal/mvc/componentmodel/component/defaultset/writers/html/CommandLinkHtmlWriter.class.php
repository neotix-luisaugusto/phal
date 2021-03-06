<?php

class __CommandLinkHtmlWriter extends __ComponentWriter {
    
    public function bindComponentToClient(__IComponent &$component) {
        __UIBindingManager::getInstance()->bind(new __ComponentProperty($component, 'caption'), new __HtmlValueUpdater($component->getId()));
	}
    
    public function startRender(__IComponent &$component) {
        $properties = array();
        $component_properties = $component->getProperties();
        foreach($component_properties as $property => $value) {
            $properties[] = $property . ' = "' . $value . '"';
        }
        $properties[] = 'id = "' . $component->getId() . '"';
        $properties[] = 'name="' . $component->getName() . '"';        
        $properties[] = 'href = "javascript:void(null);"';
        
        $return_value = '<a ' . implode(' ', $properties) . '>';
        return $return_value;
    }

    public function endRender(__IComponent &$component) {
        return '</a>';
    }
    
    public function renderContent($enclosed_content, __IComponent &$component) {
        return $component->getCaption();
    }    
    
}
