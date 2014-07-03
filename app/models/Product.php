<?php

class Product extends Eloquent {
  protected $guarded = array();
  public function category() {
    return $this->belongsTo('Category', 'fk_category');
  }
  public function sections() {
    return $this->belongsToMany('Section', 'product_section', 'fk_product', 'fk_section');
  }
}