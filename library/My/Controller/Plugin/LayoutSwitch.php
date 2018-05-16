<?php

class My_Controller_Plugin_LayoutSwitch extends Zend_Controller_Plugin_Abstract {

    public function routeShutdown(Zend_Controller_Request_Abstract $request) {
        Zend_Layout::startMvc();
        $layout = Zend_Layout::getMvcInstance();
        $moduleName = $request->getModuleName();
        $layout->setLayoutPath(APPLICATION_PATH . '/layouts');
        $layout->setLayout($moduleName);
    }
}