<?php
namespace Drupal\d8training\Access;

use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\d8training\Services\MyServices;
use Drupal\node\Entity\Node;
use Drupal\node\NodeInterface;


/**
 * Checks access for displaying configuration translation page.
 */
class CustomAccessCheck implements AccessInterface { 

  /**
   * Drupal core Request Stack.
   *
   * @var \Drupal\d8training\Services
   */
  private $myService;

  /**
   * CustomAccessCheck constructor.
   *
   * @param \Drupal\d8training\Services
   *   MyServices does things.
   */
  public function __construct(MyServices $myService) {
    $this->myService = $myService;
  }

  /**
   * A custom access check.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for this account.
   *
   * @return \Drupal\Core\Access\AccessResultInterface
   *   The access result.
   */
  public function access(AccountInterface $account, $node) {
       
    $node1 =\Drupal::entityTypeManager()->getStorage('node')->load($node);

    return ($this->myService->checkAccess($node1)) ? AccessResult::allowed() : AccessResult::forbidden();
  }

}