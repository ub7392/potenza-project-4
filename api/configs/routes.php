<?php
  $route = new Zend_Controller_Router_Route(
  'api',
  array(
    'module'      => 'api',
    'controller'  => 'index',
    'action'      => 'index'
  ));
  $router->addroute('api', $route);

  //api/people
  $peopleRoute = new Zend_Controller_Router_Route(
    'api/people',
    array(
      'module'      =>  'api',
      'controller'  =>  'people',
      'action'      =>  'index'
    )
  );
  $router->addroute('people', $peopleRoute);

  //api/people/id
  $people_id = new Zend_Controller_Router_Route(
    'api/people/:people_id',
    array(
      'module'      =>  'api',
      'controller'  =>  'people',
      'action'      =>  'index'
    )
  );
  $router->addroute('people_id', $people_id);

  //api/states
  $states = new Zend_Controller_Router_Route(
    'api/states',
    array(
      'module'      =>  'api',
      'controller'  =>  'states',
      'action'      =>  'index'
    )
  );
  $router->addroute('states', $states);

  //api/states/id
  $states_id = new Zend_Controller_Router_Route(
    'api/states/:states_id',
    array(
      'module'      =>  'api',
      'controller'  =>  'states',
      'action'      =>  'index'
    )
  );
  $router->addroute('states_id', $states_id);

  //api/visits
  $visits = new Zend_Controller_Router_Route(
    'api/visits',
    array(
      'module'      =>  'api',
      'controller'  =>  'visits',
      'action'      =>  'index'
    )
  );
  $router->addroute('visits', $visits);

  //api/visits/id
  $visitsid = new Zend_Controller_Router_Route(
    'api/visits/:id',
    array(
      'module'      =>  'api',
      'controller'  =>  'visits',
      'action'      =>  'index'
    )
  );
  $router->addroute('id', $visitsid);
