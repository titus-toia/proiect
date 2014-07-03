<?php
namespace Warehouse\Providers;
use Warehouse\Services\CategoryService;
use Warehouse\Services\OrderService;
use Warehouse\Services\ProductService;
use Warehouse\Services\SectionService;

/**
 * Apologies for name overloading.
 *
 * Class ServiceProvider
 * @package Warehouse\Providers
 */
class ServiceProvider extends \Illuminate\Support\ServiceProvider {
  public function register() {
    $this->app->bind('CategoryService', function() {
      return new CategoryService(
        $this->app->make('Warehouse\Repositories\ICategoryRepository'),
        $this->app->make('Warehouse\Repositories\IProductRepository')
      );
    });

    $this->app->bind('OrderService', function() {
      return new OrderService(
        $this->app->make('Warehouse\Repositories\IOrderRepository')
      );
    });

    $this->app->bind('ProductService', function() {
      return new ProductService(
        $this->app->make('Warehouse\Repositories\IProductRepository')
      );
    });

    $this->app->bind('SectionService', function() {
      return new SectionService(
        $this->app->make('Warehouse\Repositories\IProductRepository'),
        $this->app->make('Warehouse\Repositories\ISectionRepository')
      );
    });
  }
} 