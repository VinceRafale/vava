<?php

class plgNextendSliderGeneratorNextgenGallery extends NextendPluginBase {

    var $_group = 'nextgengallery';

    function onNextendSliderGeneratorList(&$group, &$list, $showall = false) {
        if($showall || smartsliderIsFull()){
            $installed = (class_exists('nggGallery') || class_exists('C_Component_Registry'));
            if ($showall || $installed) {
                $group[$this->_group] = 'Nextgen';
        
                if (!isset($list[$this->_group])) $list[$this->_group] = array();
                $list[$this->_group][$this->_group . '_gallery'] = array('Nextgen Gallery', $this->getPath() . 'gallery' . DIRECTORY_SEPARATOR, true, true, $installed ? true : 'http://wordpress.org/plugins/nextgen-gallery/');
            }
        }
    }

    function getPath() {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR;
    }
}

NextendPlugin::addPlugin('nextendslidergenerator', 'plgNextendSliderGeneratorNextgenGallery');