<?php

namespace Drupal\movies\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityPublishedTrait;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the Movie entity entity.
 *
 * @ingroup movies
 *
 * @ContentEntityType(
 *   id = "movie_entity",
 *   label = @Translation("Movie entity"),
 *   bundle_label = @Translation("Movie entity type"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\movies\MovieEntityListBuilder",
 *     "views_data" = "Drupal\movies\Entity\MovieEntityViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\movies\Form\MovieEntityForm",
 *       "add" = "Drupal\movies\Form\MovieEntityForm",
 *       "edit" = "Drupal\movies\Form\MovieEntityForm",
 *       "delete" = "Drupal\movies\Form\MovieEntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\movies\MovieEntityHtmlRouteProvider",
 *     },
 *     "access" = "Drupal\movies\MovieEntityAccessControlHandler",
 *   },
 *   base_table = "movie_entity",
 *   translatable = FALSE,
 *   admin_permission = "administer movie entity entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "bundle" = "type",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "langcode" = "langcode",
 *     "published" = "status",
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/movie_entity/{movie_entity}",
 *     "add-page" = "/admin/structure/movie_entity/add",
 *     "add-form" = "/admin/structure/movie_entity/add/{movie_entity_type}",
 *     "edit-form" = "/admin/structure/movie_entity/{movie_entity}/edit",
 *     "delete-form" = "/admin/structure/movie_entity/{movie_entity}/delete",
 *     "collection" = "/admin/structure/movie_entity",
 *   },
 *   bundle_entity_type = "movie_entity_type",
 *   field_ui_base_route = "entity.movie_entity_type.edit_form"
 * )
 */
class MovieEntity extends ContentEntityBase implements MovieEntityInterface {

  use EntityChangedTrait;
  use EntityPublishedTrait;

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    // Add the published field.
    $fields += static::publishedBaseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Movie entity entity.'))
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);

    $fields['status']->setDescription(t('A boolean indicating whether the Movie entity is published.'))
      ->setDisplayOptions('form', [
        'type' => 'boolean_checkbox',
        'weight' => -3,
      ]);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }

}
