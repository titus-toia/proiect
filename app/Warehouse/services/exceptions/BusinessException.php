<?php
namespace Warehouse\Services\Exceptions;
use Warehouse\Services\Exception;

class BusinessException extends Exception {
  public static $httpCode = '422';
} 