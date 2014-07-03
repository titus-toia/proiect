<?php
namespace Warehouse\Repositories\Eloquent;
use Warehouse\Repositories\IOrderRepository;

class OrderRepository extends Repository implements IOrderRepository {
  protected $modelName = 'Order';
} 