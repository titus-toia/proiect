<?php

class Section extends Eloquent {
  protected $guarded = array();
  public function products() {
    return $this->belongsToMany('Product', 'product_section', 'fk_section', 'fk_product');
  }
}