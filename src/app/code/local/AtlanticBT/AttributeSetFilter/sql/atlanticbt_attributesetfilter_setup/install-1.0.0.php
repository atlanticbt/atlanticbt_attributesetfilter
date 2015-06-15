<?php
/** @var AtlanticBT_AttributeSetFilter_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

$attributes = array(
    'attribute_set_filter' => array(
        'type'       => 'int',
        'label'      => 'Attribute Set Filter',
        'note'       => 'Automatically set when product is saved',
        'input'      => 'select',
        'source'     => 'atlanticbt_attributesetfilter/product_attribute_source_attributesetfilter',
        'sort_order' => 1000,
        'searchable' => false,
        'comparable' => false,
        'required'   => false,
        'visible'    => true,
        'filterable' => 1
    )
);

foreach ($attributes as $code => $options) {
    $installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, $code, $options);

    // add attribute to all sets
    $attributeSetIds = $installer->getAllAttributeSetIds(Mage_Catalog_Model_Product::ENTITY);
    foreach ($attributeSetIds as $attributeSetId) {
        $groupId = $installer->getDefaultAttributeGroupId(Mage_Catalog_Model_Product::ENTITY, $attributeSetId);
        $installer->addAttributeToSet(Mage_Catalog_Model_Product::ENTITY, $attributeSetId, $groupId, $code, 1000);
    }
}

$installer->endSetup();