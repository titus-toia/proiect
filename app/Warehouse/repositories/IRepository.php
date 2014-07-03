<?php
namespace Warehouse\Repositories;

interface IRepository {
  public function create(array $data);
  public function update($id, array $data);
  public function search($cols = array());
  public function find($id);
  public function destroy($id);
}