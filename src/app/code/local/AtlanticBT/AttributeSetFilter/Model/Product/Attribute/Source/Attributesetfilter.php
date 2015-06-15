<?php
class AtlanticBT_AttributeSetFilter_Model_Product_Attribute_Source_Attributesetfilter
    extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
    const CONFIG_PATH_ATTRIBUTE_SETS = 'atlanticbt_attributesetfilter/config/attribute_sets';

    /**
     * @return array
     */
    public function getAllOptions()
    {
        if (!$this->_options) {

            $entityTypeId = Mage::getModel('catalog/product')
                ->getResource()
                ->getTypeId();

            /** @var Mage_Eav_Model_Resource_Entity_Attribute_Set_Collection $collection */
            $collection = Mage::getResourceModel('eav/entity_attribute_set_collection');
            $collection->setEntityTypeFilter($entityTypeId);

            $attributeSets = Mage::getStoreConfig(self::CONFIG_PATH_ATTRIBUTE_SETS);
            if ($attributeSets) {
                $attributeSets = explode(',', $attributeSets);
                $collection->addFieldToFilter('attribute_set_id', array('in' => $attributeSets));
            }

            $collection->toOptionArray();

            $this->_options = $collection->load()
                ->toOptionArray();
        }
        return $this->_options;
    }
} 