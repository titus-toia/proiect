<?php

class Category extends Eloquent {
  protected $guarded = array();
  public function products() {
    return $this->hasMany('Product', 'fk_category');
  }
}