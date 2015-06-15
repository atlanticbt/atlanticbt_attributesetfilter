<?php
class AtlanticBT_AttributeSetFilter_Model_Adminhtml_System_Config_Source_Attributesets {

    public function toOptionArray()
    {
        $entityTypeId = Mage::getModel('catalog/product')
            ->getResource()
            ->getTypeId();

        /** @var Mage_Eav_Model_Resource_Entity_Attribute_Set_Collection $collection */
        $collection = Mage::getResourceModel('eav/entity_attribute_set_collection');
        $collection->setEntityTypeFilter($entityTypeId);
        $optionsArray = $collection->load()
            ->toOptionArray();

        array_unshift($optionsArray, array('value' => '', 'label' => ''));
        return $optionsArray;
    }
} 