<?php
namespace Drupal\nodes_to_json\Services;

use Symfony\Component\HttpFoundation\Response;
use Drupal\node\Entity\Node;

class JsonExp {

  public function transformation() {
    $query = \Drupal::entityQuery('node');
    $nidsArray = $query->execute();
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nidsArray);
    $data = [];
    foreach ($nodes as $node) {
      $nid = $node->nid->value;
      $type = $node->getEntityTypeId();
      $title = $node->getTitle();
      $data[] = [
        'node_nid' => $nid,
        'node_type' => $type,
        'node_title' => $title,
      ];
    }

    $json = \GuzzleHttp\json_encode($data);
    $result = Response::create(
      $json
    );
    $result->headers->set('Content-type', 'application/json');
    return $result;
  }

}