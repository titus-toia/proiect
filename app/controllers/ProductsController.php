<?php
use Warehouse\Services\ProductService;

class ProductsController extends \BaseController {
  protected $service;
  public function __construct(ProductService $productService) {
    $this->service = $productService;
  }
}
