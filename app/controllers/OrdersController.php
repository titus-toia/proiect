<?php
use Warehouse\Services\OrderService;
class OrdersController extends \BaseController {
  protected $service;
  public function __construct(OrderService $orderService) {
    $this->service = $orderService;
  }
}
