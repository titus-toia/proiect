<?php
class ProductSection extends Eloquent {
  protected $table = "product_section";
  public function product() {
    return $this->belongsTo('Product', 'fk_product');
  }
  public function section() {
    return $this->belongsTo('Section', 'fk_product');
  }
}