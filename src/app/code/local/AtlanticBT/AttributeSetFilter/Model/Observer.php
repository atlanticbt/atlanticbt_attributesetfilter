<?php
class AtlanticBT_AttributeSetFilter_Model_Observer extends Varien_Object
{
    public function catalogProductSaveBefore(Varien_Event_Observer $observer)
    {
        /** @var Mage_Catalog_Model_Product $product */
        $product = $observer->getProduct();

        $attributeSetId = $product->getAttributeSetId();
        $product->setAttributeSetFilter($attributeSetId);
        return $this;
    }
} 