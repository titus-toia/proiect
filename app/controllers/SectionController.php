<?php
use Warehouse\Services\SectionService;

class SectionController extends \BaseController {
  protected $service;
  public function __construct(SectionService $sectionService) {
    $this->service = $sectionService;
  }
}
