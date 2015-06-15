<?php
/** @var Mage_Catalog_Model_Resource_Product_Collection $collection */
$collection = Mage::getModel('catalog/product')->getCollection();

// only select products that are enabled, and visible in the catalog or search
$collection->setVisibility(
        array(
            Mage_Catalog_Model_Product_Visibility::VISIBILITY_IN_CATALOG,
            Mage_Catalog_Model_Product_Visibility::VISIBILITY_IN_SEARCH,
            Mage_Catalog_Model_Product_Visibility::VISIBILITY_BOTH
        )
    )
    ->addAttributeToFilter('status', array('eq' => Mage_Catalog_Model_Product_Status::STATUS_ENABLED));

/** @var Mage_Catalog_Model_Product $product */
foreach ($collection as $product) {
    $product->setAttributeSetFilter($product->getAttributeSetId());
    $product->getResource()
        ->saveAttribute($product, 'attribute_set_filter');
}

