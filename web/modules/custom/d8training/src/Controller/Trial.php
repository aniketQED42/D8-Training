<?php
namespace Drupal\d8training\Controller;

use Drupal\Core\Controller\ControllerBase;

class Trial extends ControllerBase{

  /**
   * Returns a render-able array for a test page.
   */
  public function hello() {
    $build = [
      '#markup' => t('Hello! I am your view listing page1.'),
    ];
    return $build;
  }

}