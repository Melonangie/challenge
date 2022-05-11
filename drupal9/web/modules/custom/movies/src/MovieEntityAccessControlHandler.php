<?php

namespace Drupal\movies;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Movie entity entity.
 *
 * @see \Drupal\movies\Entity\MovieEntity.
 */
class MovieEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\movies\Entity\MovieEntityInterface $entity */

    switch ($operation) {

      case 'view':

        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished movie entity entities');
        }


        return AccessResult::allowedIfHasPermission($account, 'view published movie entity entities');

      case 'update':

        return AccessResult::allowedIfHasPermission($account, 'edit movie entity entities');

      case 'delete':

        return AccessResult::allowedIfHasPermission($account, 'delete movie entity entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add movie entity entities');
  }


}
