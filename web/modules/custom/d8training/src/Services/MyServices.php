<?php
namespace Drupal\d8training\Services;

use Drupal\node\Entity\Node;
use Drupal\node\NodeInterface;
use Drupal\user\UserInterface;

class MyServices{

    public function checkAccess($node){
        $user = \Drupal::currentUser()->getUsername(); //LoggedUser  
        $author = $node->getOwner()->getUsername(); //AuthorName

        if ($user == $author){
            return true;

        } else {
            return false;
        }
    }
}