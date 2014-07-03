<?php
namespace Warehouse\Services\Exceptions;
use Warehouse\Services\Exception;

class NotFoundException extends Exception {
  public static $httpCode = '404';
} 