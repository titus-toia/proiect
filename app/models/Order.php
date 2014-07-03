<?php

class Order extends Eloquent {
  protected $guarded = array();
  public function product() {
    return $this->belongsTo('Product', 'fk_product');
  }
}