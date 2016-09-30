<?php

/**
 * EAV attribute resource model
 *
 * @category    Mage
 * @package     Mage_Eav
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Kiwee_AttributeLoad_Model_Resource_Attribute extends Mage_Catalog_Model_Resource_Attribute
{
	const ENTITY_TYPE_ID_FIELD = 'entity_type_id';
	/**
	 * Retrieve select object for load object data
	 *
	 * @param string $field
	 * @param mixed $value
	 * @param Mage_Core_Model_Abstract $object
	 * @return Zend_Db_Select
	 */
	protected function _getLoadSelect($field, $value, $object)
	{
		$field  = $this->_getReadAdapter()->quoteIdentifier(sprintf('%s.%s', $this->getMainTable(), $field));
		$select = $this->_getReadAdapter()->select()
			->from($this->getMainTable())
			->where($field . '=?', $value);

		if ($object->hasEntityTypeId()) {
			$field  = $this->_getReadAdapter()->quoteIdentifier(sprintf('%s.%s', $this->getMainTable(), self::ENTITY_TYPE_ID_FIELD));
			$select->where($field . '=?', $object->getEntityTypeId());
		}

		return $select;
	}
}
