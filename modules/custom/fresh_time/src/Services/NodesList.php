<?php

namespace Drupal\fresh_time\Services;

use Drupal\Console\Bootstrap\Drupal;
use Drupal\Core\Entity\Query;
use Drupal\user\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Drupal\node\Entity\Node;
use Drupal\redirect\Entity\Redirect;
use Symfony\Component\HttpFoundation;

class NodesList {

  public function showFresh() {
      $dataNodes = [];
      $dayStart = mktime(0,0,0);
      $query = \Drupal::entityQuery('node');
      $query->condition('created', $dayStart, '>');
      $nodesNids = $query->execute();
      $nodes = \Drupal\node\Entity\Node::loadMultiple($nodesNids);
      foreach ($nodes as $node) {
        $nidNode = $node->nid->value;
        $titleNode = $node->getTitle();
        $dataNodes[] = [
          'nid' => $nidNode,
          'title' => $titleNode,
        ];
      };
      $nodesList = [
        '#type' => 'table',
        '#header' => [t('NID'), t('Title')],
        '#rows' => $dataNodes,
        '#emty' => 'no data',
      ];
    return $nodesList;
  }

  public function showTime() {
    $currentTimestamp = time();
    $currentFormatedTime = date('d-m-Y H:i:s', $currentTimestamp);
    $time = [
      '#markup' => $currentFormatedTime,
      '#cache' => [
        'tags' => \Drupal::entityTypeManager()->getStorage('user')->load('14')->getCacheTags(),
        'context' => ['user'],
        'max-age' => 44,
      ]
    ];

    return $time;
  }

  public function setTitle() {
    $dynamicNodeTitle = 'My page. Generated at '.date('H:i:s');
    return $dynamicNodeTitle;
  }
}