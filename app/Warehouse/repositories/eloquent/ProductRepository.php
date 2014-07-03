<?php
namespace Warehouse\Repositories\Eloquent;
use Warehouse\Repositories\IProductRepository;

class ProductRepository extends Repository implements IProductRepository {
  protected $modelName = 'Product';
} 