<?php
namespace Warehouse\Repositories\Eloquent;
use Warehouse\Repositories\IUserRepository;

class UserRepository extends Repository implements IUserRepository {
  protected $modelName = 'User';
}