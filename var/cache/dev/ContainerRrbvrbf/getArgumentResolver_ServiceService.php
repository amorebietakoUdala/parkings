<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'argument_resolver.service' shared service.

include_once $this->targetDirs[3].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\HttpKernel\\Controller\\ArgumentValueResolverInterface.php';
include_once $this->targetDirs[3].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\HttpKernel\\Controller\\ArgumentResolver\\ServiceValueResolver.php';

return $this->services['argument_resolver.service'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\ServiceValueResolver(new \Symfony\Component\DependencyInjection\ServiceLocator(['AppBundle\\Controller\\APIController:getActivitiesAction' => function () {
    return ${($_ = isset($this->services['service_locator.xm2yc0i']) ? $this->services['service_locator.xm2yc0i'] : $this->load('getServiceLocator_Xm2yc0iService.php')) && false ?: '_'};
}, 'AppBundle\\Controller\\APIController:setViewHandler' => function () {
    return ${($_ = isset($this->services['service_locator.lllhbbu']) ? $this->services['service_locator.lllhbbu'] : $this->load('getServiceLocator_LllhbbuService.php')) && false ?: '_'};
}, 'AppBundle\\Controller\\APIController::getActivitiesAction' => function () {
    return ${($_ = isset($this->services['service_locator.xm2yc0i']) ? $this->services['service_locator.xm2yc0i'] : $this->load('getServiceLocator_Xm2yc0iService.php')) && false ?: '_'};
}, 'AppBundle\\Controller\\APIController::setViewHandler' => function () {
    return ${($_ = isset($this->services['service_locator.lllhbbu']) ? $this->services['service_locator.lllhbbu'] : $this->load('getServiceLocator_LllhbbuService.php')) && false ?: '_'};
}]));