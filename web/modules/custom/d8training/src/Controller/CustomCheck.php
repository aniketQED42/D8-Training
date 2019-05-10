<?php
namespace Drupal\d8training\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\node\NodeInterface;
use Drupal\user\UserInterface;

class CustomCheck extends ControllerBase{

    public function checkAccess(NodeInterface $node){
        $user = \Drupal::currentUser()->getUsername(); //CurrentUser
        
        $author = $node->getOwner()->getUsername();; //AuthorName
        $build = [
            '#markup' => t('Author Name : ' . $author),
                         t('Current User : ' . $user),
          ];
          return $build;

    }


}