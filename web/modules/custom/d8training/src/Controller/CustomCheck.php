<?php
namespace Drupal\d8training\Controller;

use Drupal\Core\Controller\ControllerBase;

class CustomCheck extends ControllerBase{

    public function controllerClass(){

        $build = [
            '#markup' => t('Welcome, You have the required access'),
          ];
          return $build;
    }
}