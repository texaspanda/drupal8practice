<?php

namespace Drupal\fresh_time\Services;

use Drupal\Core\Config\Entity\Query\QueryFactory;
use Symfony\Component\DependencyInjection;
use Drupal\node\Entity;

class FindSimilarContent {


  public function findNodes($text) {
    $words = explode(' ', $text);
    $query = \Drupal::entityQuery('node');
    foreach ($words as $word) {
      $query->condition('title', $word, 'CONTAINS');
    }
    $queryResult = $query->execute();
    $nodeListObj = \Drupal\node\Entity\Node::loadMultiple($queryResult);
    foreach ($nodeListObj as $nodeObj) {
      $nodes[] = [
        'title' => $nodeObj->getTitle(),
        'url' => $nodeObj->url(),
      ];
    }

    $renderable = [
      '#theme' => 'similar',
      '#nodes' => $nodes,
    ];

    return $renderable;
  }
}