<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'service_locator.xm2yc0i' shared service.

return $this->services['service_locator.xm2yc0i'] = new \Symfony\Component\DependencyInjection\ServiceLocator(['paramFetcher' => function () {
    return ${($_ = isset($this->services['fos_rest.request.param_fetcher']) ? $this->services['fos_rest.request.param_fetcher'] : $this->getFosRest_Request_ParamFetcherService()) && false ?: '_'};
}]);
