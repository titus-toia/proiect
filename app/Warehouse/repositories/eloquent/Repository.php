<?php
namespace Warehouse\Repositories\Eloquent;
use Illuminate\Container\Container;
use Warehouse\Repositories\IRepository;

class Repository implements IRepository {
  protected $model;
  protected $modelName;
  public function __construct(Container $app) {
    $this->model = $app->make($this->modelName);
  }

  public function create(array $data) {
    return $this->model->create($data);
  }

  public function update($id, array $data) {
    $model = $this->model->find($id);
    if($model !== null)
      return $model->update($data);
    else
      return false;
  }

  public function search($cols = array()) {
    $query = $this->model->newQuery();
    foreach($cols as $col => $val) {
      $query = $query->where($col, $val);
    }
    return $query->get();
  }

  public function find($id) {
    return $this->model->find($id);
  }

  public function destroy($id) {
    $model = $this->model->find($id);
    if($model !== null)
      return $model->delete();
    else
      return false;
  }
}