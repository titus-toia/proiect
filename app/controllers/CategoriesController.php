<?php
use Warehouse\Services\CategoryService;

class CategoriesController extends \BaseController {
  protected $service;
  public function __construct(CategoryService $categoryService) {
    $this->service = $categoryService;
  }
}
