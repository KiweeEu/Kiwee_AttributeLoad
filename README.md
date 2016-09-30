# Kiwee_AttributeLoad
A tiny Magento extension to fix a bug in API when catalogProductAttributeInfo() tries to retrieve an attribute by attribute_code and the attribute_code is not univoque

To reproduce the issue, create a testapi.php file in shell folder:

    <?php
    require_once 'app/Mage.php';
    Mage::app();
    $result = Mage::getModel('catalog/product_attribute_api_v2')->info('gender');
    var_dump($result);

Then by running:

    php shell/testapi.php

You will notice that $result is empty.
This is due to the fact that the gender attribute is present for the customer entity type with a lower Id, thus is getting selected but not returned.
