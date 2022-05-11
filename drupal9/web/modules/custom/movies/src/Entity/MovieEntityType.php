<?php

namespace Drupal\movies\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Movie entity type entity.
 *
 * @ConfigEntityType(
 *   id = "movie_entity_type",
 *   label = @Translation("Movie entity type"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\movies\MovieEntityTypeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\movies\Form\MovieEntityTypeForm",
 *       "edit" = "Drupal\movies\Form\MovieEntityTypeForm",
 *       "delete" = "Drupal\movies\Form\MovieEntityTypeDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\movies\MovieEntityTypeHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "movie_entity_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "movie_entity",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/movie_entity_type/{movie_entity_type}",
 *     "add-form" = "/admin/structure/movie_entity_type/add",
 *     "edit-form" = "/admin/structure/movie_entity_type/{movie_entity_type}/edit",
 *     "delete-form" = "/admin/structure/movie_entity_type/{movie_entity_type}/delete",
 *     "collection" = "/admin/structure/movie_entity_type"
 *   }
 * )
 */
class MovieEntityType extends ConfigEntityBundleBase implements MovieEntityTypeInterface {

  /**
   * The Movie entity type ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Movie entity type label.
   *
   * @var string
   */
  protected $label;

}
