<?php
namespace Warehouse\Repositories\Eloquent;
use Warehouse\Repositories\ICategoryRepository;

class CategoryRepository extends Repository implements ICategoryRepository {
  protected $modelName = 'Category';
}