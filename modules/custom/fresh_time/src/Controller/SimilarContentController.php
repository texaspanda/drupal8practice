<?php


namespace Drupal\fresh_time\Controller;

use Drupal\fresh_time\Services\FindSimilarContent;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SimilarContentController extends ControllerBase {
  /**
   * @var \Drupal\fresh_time\Services\FindSimilarContent
   */
  private $list;

  public function __construct(FindSimilarContent $nodes) {
    $this->list = $nodes;
  }

  public function find() {
    $nodeList = $this->list->findNodes('sad');
//    xdebug_break();
    return $nodeList;
  }

  static public function create(ContainerInterface $container){
    $nodes = $container->get('fresh_time.similar_content');
    return new static($nodes);
  }

}