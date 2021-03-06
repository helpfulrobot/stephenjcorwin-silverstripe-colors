<?php
class Color extends StyleObject {
  /**
   * FIELDS
  */

  private static $db = array (
    'Name' => 'Text',
    'Value' => 'Text'
  );
  
  /**
   * DEFAULT RECORDS
   */

  private static $default_records = array (
    array (
      'Name' => 'Transparent',
      'Value' => 'transparent'
    ),
    array (
      'Name' => 'Black',
      'Value' => '#000000'
    ),
    array (
      'Name' => 'Black Moderate Transparent',
      'Value' => 'rgba(0,0,0,0.5)'
    ),
    array (
      'Name' => 'White',
      'Value' => '#FFFFFF'
    ),
    array (
      'Name' => 'Red',
      'Value' => '#FF0000'
    ),
    array (
      'Name' => 'Green',
      'Value' => '#00FF00'
    ),
    array (
      'Name' => 'Blue',
      'Value' => '#0000FF'
    )
  );

  /**
   * CONFIGURATION
   */

  private static $default_sort='Name ASC';

  private static $summary_fields = array (    
    'Name' => 'Name',
    'Value' => 'Value',
    'CMSPreview' => 'Preview'
  );

  /**
   * CMS FIELDS
   */

  public function getCMSFields() {
    $fields = parent::getCMSFields();
    
    /**
     * MAIN TAB
     */

    $tab = 'Root.Main';

    $field = new TextField('Name');
    $fields->addFieldToTab($tab, $field);

    $field = new TextField('Value');
    $fields->addFieldToTab($tab, $field);

    $html = ViewableData::renderWith('Color_CMS_Preview');
    $field = new LiteralField('Preview', $html);
    $fields->addFieldToTab($tab, $field);
    
    return $fields;
  }

  public function getCMSPreview() {
    $html = ViewableData::renderWith('Color_CMS_Preview');
    $obj = HTMLText::create();
    $obj->setValue($html);
    return $obj;
  }
}