<?php

namespace Drupal\myplugs\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\myplugs\Services\ActiveUsers;

/**
 * Provides a 'ActiveList' block.
 *
 * @Block(
 *  id = "active_list",
 *  admin_label = @Translation("Last active users"),
 * )
 */
class ActiveList extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Drupal\myplugs\Services\ActiveUsersEnts definition.
   *
   * @var \Drupal\myplugs\Services\ActiveUsers
   */
  protected $myplugsUsersList;
  /**
   * Constructs a new ActiveList object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param string $plugin_definition
   *   The plugin implementation definition.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    ActiveUsers $myplugs_users_list
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->myplugsUsersList = $myplugs_users_list;
  }
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('myplugs.users_list')
    );
  }
  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['active_list']['#markup'] = '| ';
    $lastActiveUsersList = $this->myplugsUsersList->usersList();
    foreach ($lastActiveUsersList as $activeUser) {
      $uid = $activeUser['uid'];
      $username = $activeUser['name'];
      $build['active_list']['#markup'] .= "$username" .' UID ' . " $uid" . " | ";
    }
    return $build;
  }

}
