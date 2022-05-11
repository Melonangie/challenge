<?php

/**
 * @file
 * Contains movie_entity.page.inc.
 *
 * Page callback for Movie entity entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Movie entity templates.
 *
 * Default template: movie_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_movie_entity(array &$variables) {
  // Fetch MovieEntity Entity Object.
  $movie_entity = $variables['elements']['#movie_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
