<?php
namespace Warehouse\Providers;
use Illuminate\Support\ServiceProvider;
use Warehouse\Repositories\Eloquent\CategoryRepository;
use Warehouse\Repositories\Eloquent\ProductRepository;
use Warehouse\Repositories\Eloquent\SectionRepository;
use Warehouse\Repositories\Eloquent\UserRepository;

class RepositoryProvider extends ServiceProvider {
  public function register() {
    $this->app->bind('Warehouse\Repositories\ICategoryRepository', function() {
      return new CategoryRepository($this->app);
    }, true);

    $this->app->bind('Warehouse\Repositories\IProductRepository', function() {
      return new ProductRepository($this->app);
    }, true);

    $this->app->bind('Warehouse\Repositories\ISectionRepository', function() {
      return new SectionRepository($this->app);
    }, true);

    $this->app->bind('Warehouse\Repositories\IUserRepository', function() {
      return new UserRepository($this->app);
    }, true);
  }
}