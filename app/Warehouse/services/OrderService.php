<?php
namespace Warehouse\Services;
use Warehouse\Repositories\IOrderRepository;

class OrderService {
  private $orders;
  public function __construct(IOrderRepository $orders) {
    $this->orders = $orders;
  }

  public function all() {
    return $this->orders->search();
  }
  public function create($data) {
    return $this->orders->create($data);
  }
  public function get($id) {
    return $this->orders->find($id);
  }
  public function update($id, $data) {
    if($this->orders->update($id, $data) === false)
      throw new NotFoundException("Invalid ID");
  }
  public function destroy($id) {
    if($this->orders->destroy($id) === false) {
      throw new NotFoundException("Invalid ID");
    }
  }
} 