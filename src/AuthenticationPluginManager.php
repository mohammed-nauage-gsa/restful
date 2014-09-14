<?php

/**
 * @file
 * Contains \Drupal\restful\AuthenticationPluginManager.
 */

namespace Drupal\restful;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
 * Manages restful authentication plugins.
 */
class AuthenticationPluginManager extends DefaultPluginManager {

  /**
   * Constructs authentication plugin manager.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct('Plugin/authentication', $namespaces, $module_handler, NULL, 'Drupal\restful\Annotation\Authentication');
    $this->alterInfo('restful_authentication_alter');
    $this->setCacheBackend($cache_backend, 'restful_authentication');
  }
}
