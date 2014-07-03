<?php
namespace Warehouse\Services;
use Warehouse\Repositories\IProductRepository;

class ProductService {
  private $products;
  public function __construct(IProductRepository $products) {
    $this->products = $products;
  }

  public function all() {
    return $this->products->search();
  }
  public function create($data) {
    return $this->products->create($data);
  }
  public function get($id) {
    return $this->products->find($id);
  }
  public function update($id, $data) {
    if($this->products->update($id, $data) === false)
      throw new NotFoundException("Invalid ID");
  }
  public function destroy($id) {
    if($this->products->destroy($id) === false) {
      throw new NotFoundException("Invalid ID");
    }
  }
} 