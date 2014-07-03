<?php
namespace Warehouse\Repositories\Eloquent;
use Warehouse\Repositories\ISectionRepository;

class SectionRepository extends Repository implements ISectionRepository {
  protected $modelName = 'Section';
}