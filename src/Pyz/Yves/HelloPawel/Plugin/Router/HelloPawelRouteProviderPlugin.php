<?php

namespace Pyz\Yves\HelloPawel\Plugin\Router;

use Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin;
use Spryker\Yves\Router\Route\RouteCollection;

class HelloPawelRouteProviderPlugin extends AbstractRouteProviderPlugin
{
    protected const ROUTE_HELLO_PAWEL_INDEX = 'hello-pawel-index';

    /**
     * Specification:
     * - Adds Routes to the RouteCollection.
     *
     * @param \Spryker\Yves\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Yves\Router\Route\RouteCollection
     * @api
     *
     */
    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        $routeCollection = $this->addHelloPawelIndexRoute($routeCollection);

        return $routeCollection;
    }

    /**
     * @param \Spryker\Yves\Router\Route\RouteCollection $routeCollection
     *
     * @return \Spryker\Yves\Router\Route\RouteCollection
     */
    protected function addHelloPawelIndexRoute(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('/hello-pawel', 'HelloPawel', 'Index', 'indexAction');
        $routeCollection->add(static::ROUTE_HELLO_PAWEL_INDEX, $route);

        return $routeCollection;
    }
}
