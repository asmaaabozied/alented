<?php

return array (
  'singular' => 'Product',
  'plural' => 'Products',
  'fields' => 
  array (
    'id' => 'Id',
    'title_en' => 'English Title',
    'title_ar' => 'Arabic Title',
    'description_en' => 'English Description',
    'description_ar' => 'Arabic Description',
    'category_id' => 'Category',
    'region_id' => 'Region',
    'url' => 'Url',
    'image' => 'Image',
    'status' => 'Status',
    'user_id' => 'User',
    'created_at' => 'Created At',
    'end_date' => 'End date',
    'updated_at' => 'Updated At',
    'type'       => 'Type',
    'en_pdf'=>'Pdf File for English Version',
    'ar_pdf'=>'Pdf File for Arabic Version',
  ),
  'status' => array(
    '1' => 'New',
    '2' => 'Processing',
    '3' => 'Accepted',
    '4' => 'Rejected'
  ),
  'type' => array(
    '1' => 'Comertial',
    '2' => 'Governal',
  ),
);
