<?php
namespace Drupal\nodes_to_json\Controller;

use Drupal\Console\Bootstrap\Drupal;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Drupal\nodes_to_json\Services\JsonExp;

class NodesToJson extends ControllerBase {

  /**
   * @var \Drupal\nodes_to_json\Services\jsonExp
   */
  private $trans;

  public function __construct(JsonExp $transformator) {

    $this->trans = $transformator;
  }

  public function generate() {
    $result = $this->trans->transformation();
    return $result;
  }

  public static function create(ContainerInterface $container) {
    $transformator = $container->get('nodes_to_json.jsonExp');
    return new static($transformator);
  }



}