<?php

namespace Drupal\fresh_time\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\fresh_time\Services\NodesList;
use Drupal\fresh_time\Services\WhatDay;
use Drupal\node\Entity\Node;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\user\Entity\User;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;

class GetToday extends ControllerBase {

  /**
   * @var \Drupal\fresh_time\Services\NodesList
   */
  private $generator;
  private $today;

  public function __construct(NodesList $generator, WhatDay $today) {
    $this->generator = $generator;
    $this->today = $today;
  }

  public function todayNodesList() {
    $result = [];
    $result['time'] = $this->generator->showTime();
    $result['fresh_nodes'] = $this->generator->showFresh();
    $result['what_day'] = $this->today->isDayOff("2018/9/18");
    return $result;
  }

  public static function create(ContainerInterface $container) {
    $generator = $container->get('fresh_time.nodes');
    $today = $container->get('fresh_time.today');
    return new static($generator, $today);
  }

  public function access(AccountInterface $account) {
    $roles = $account->getRoles();
    return AccessResult::allowedIf((in_array('anonymous', $roles)) !== TRUE);
  }
}