<?php

namespace Drupal\movies\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;

/**
 * Provides an interface for defining Movie entity entities.
 *
 * @ingroup movies
 */
interface MovieEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityPublishedInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Movie entity name.
   *
   * @return string
   *   Name of the Movie entity.
   */
  public function getName();

  /**
   * Sets the Movie entity name.
   *
   * @param string $name
   *   The Movie entity name.
   *
   * @return \Drupal\movies\Entity\MovieEntityInterface
   *   The called Movie entity entity.
   */
  public function setName($name);

  /**
   * Gets the Movie entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Movie entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Movie entity creation timestamp.
   *
   * @param int $timestamp
   *   The Movie entity creation timestamp.
   *
   * @return \Drupal\movies\Entity\MovieEntityInterface
   *   The called Movie entity entity.
   */
  public function setCreatedTime($timestamp);

}
