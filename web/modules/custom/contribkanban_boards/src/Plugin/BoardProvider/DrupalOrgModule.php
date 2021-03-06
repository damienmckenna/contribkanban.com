<?php

namespace Drupal\contribkanban_boards\Plugin\BoardProvider;

use Drupal\contribkanban_boards\Annotation\BoardProvider;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Plugin\PluginBase;
use Drupal\entity\BundleFieldDefinition;

/**
 * Provides the first bundle plugin.
 *
 * @BoardProvider(
 *   id = "drupalorg_module",
 *   label = @Translation("Module"),
 *   description = @Translation("Add a board for a module"),
 * )
 */
class DrupalOrgModule extends PluginBase implements BoardProviderInterface {

  /**
   * {@inheritdoc}
   */
  public function buildFieldDefinitions() {
    $fields = [];
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function bundleFieldDefinitionsAlter(EntityTypeInterface $entity_type, $bundle, array $base_field_definitions) {
    $fields = [];

    if (isset($base_field_definitions['project_nid'])) {
      $fields['project_nid'] = clone $base_field_definitions['project_nid'];
      $fields['project_nid']->setDisplayOptions('form', []);
    }

    return $fields;
  }

}
