<?php
namespace Warehouse\Services;

use Warehouse\Repositories\IProductRepository;
use Warehouse\Repositories\ISectionRepository;

class SectionService {
  private $sections, $products;
  public function __construct(IProductRepository $products, ISectionRepository $sections) {
    $this->products = $products;
    $this->sections = $sections;
  }

  public function all() {
    return $this->$sections->search();
  }
  public function create($data) {
    return $this->$sections->create($data);
  }
  public function get($id) {
    return $this->$sections->find($id);
  }
  public function update($id, $data) {
    if($this->$sections->update($id, $data) === false)
      throw new NotFoundException("Invalid ID");
  }
  public function destroy($id) {
    if($this->$sections->destroy($id) === false) {
      throw new NotFoundException("Invalid ID");
    }
  }
} 