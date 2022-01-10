<?php

namespace KingfisherDirect\FormatDecimalAttributes\Output;

use Magento\Catalog\Helper\Output;
use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Config;

class DecimalFormatter
{
    private $eavConfig;

    public function __construct(Config $eavConfig)
    {
        $this->eavConfig = $eavConfig;
    }

    public function productAttribute(Output $output, $result, array $params)
    {
        $attribute = $this->eavConfig->getAttribute(Product::ENTITY, $params['attribute']);

        if ($attribute->getBackendType() !== 'decimal') {
            return $result;
        }

        return rtrim(rtrim($result, "0"), ".");
    }
}
