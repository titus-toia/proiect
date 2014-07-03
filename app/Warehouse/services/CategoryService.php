<?php
namespace Warehouse\Services;
use Warehouse\Repositories\ICategoryRepository;
use Warehouse\Repositories\IProductRepository;
use Warehouse\Services\Exceptions\NotFoundException;

class CategoryService {
  private $categories, $products;
  public function __construct(ICategoryRepository $categories, IProductRepository $products) {
    $this->categories = $categories;
    $this->products = $products;
  }

  public function all() {
    return $this->categories->search();
  }
  public function create($data) {
    return $this->categories->create($data);
  }
  public function get($id) {
    return $this->categories->find($id);
  }
  public function update($id, $data) {
    if($this->categories->update($id, $data) === false)
      throw new NotFoundException("Invalid ID");
  }
  public function destroy($id) {
    if($this->categories->destroy($id) === false) {
      throw new NotFoundException("Invalid ID");
    }
  }
}