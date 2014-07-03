<?php
use Warehouse\Services\Exception;
use Warehouse\Services\Exceptions\BusinessException;
use Warehouse\Services\Exceptions\NotFoundException;
use Warehouse\Services\Exceptions\ValidationException;

class BaseController extends Controller
{
  protected $service;

  const HTTP_OK = 200;

  /* API-related values */
  protected $success = true;
  protected $code = self::HTTP_OK;
  protected $data = array();
  protected $message = array();

  protected function setupLayout()
  {
    if (!is_null($this->layout)) {
      $this->layout = View::make($this->layout);
    }
  }

  public function index()
  {
    try {
      $this->data = $this->service->all();
    } catch(Exception $e) {
      return $this->_apiError($e, $e->getMessage());
    } finally {
      return $this->_apiResponse();
    }
  }

  public function store()
  {
    $post = Input::all();
    try {
      $this->data = $this->service->create($post);
    } catch(BusinessException $e) {
      return $this->_apiError($e::$httpCode, $e->getMessage());
    } catch(ValidationException $e) {
      return $this->_apiError($e::$httpCode, $e->getMessage());
    } finally {
      return $this->_apiResponse();
    }
  }

  public function show($id)
  {
    try {
      $this->data = $this->service->get($id);
    } catch(NotFoundException $e) {
      return $this->_apiError($e::$httpCode, $e->getMessage());
    } finally {
      return $this->_apiResponse();
    }
  }

  public function update($id)
  {
    $post = Input::all();
    try {
      $this->data = $this->service->update($id, $post);
    } catch(BusinessException $e) {
      return $this->_apiError($e::$httpCode, $e->getMessage());
    } catch(NotFoundException $e) {
      return $this->_apiError($e::$httpCode, $e->getMessage());
    } catch(ValidationException $e) {
      return $this->_apiError($e::$httpCode, $e->getMessage());
    } finally {
      return $this->_apiResponse();
    }
  }

  public function destroy($id)
  {
    try {
      $this->data = $this->service->destroy($id);
    } catch(BusinessException $e) {
      return $this->_apiError($e::$httpCode, $e->getMessage());
    } catch(NotFoundException $e) {
      return $this->_apiError($e::$httpCode, $e->getMessage());
    } finally {
      return $this->_apiResponse();
    }
  }

  protected function _apiResponse() {
    return Response::json([
      'success' => $this->success,
      'code' => $this->code,
      'data' => $this->data,
      'message' => $this->message
    ]);
  }
  protected function _apiError($code, $message = array(), $data = array()) {
    $this->success = false;
    $this->code = $code;
    $this->data = $data;
    $this->message = $message;
  }
}

