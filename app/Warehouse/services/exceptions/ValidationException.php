<?php
namespace Warehouse\Services\Exceptions;
use Warehouse\Services\Exception;

class ValidationException extends Exception {
  public static $httpCode = '422';
} 