<?php

namespace Drupal\movies\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Movie entity entities.
 */
class MovieEntityViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.
    return $data;
  }

}
