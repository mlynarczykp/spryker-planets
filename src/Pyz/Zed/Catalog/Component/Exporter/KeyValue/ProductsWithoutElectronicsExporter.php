<?php
namespace Pyz\Zed\Catalog\Component\Exporter\KeyValue;

use ProjectA\Zed\Catalog\Component\Exporter\QueryBuilder\AbstractProduct;

class ProductsWithoutElectronicsExporter extends ProductsExporter
{

    /**
     * @return string
     */
    protected function getProductAttributeSetName()
    {
        return self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS;
    }

    /**
     * @return \Pyz\Zed\Catalog\Component\Exporter\QueryBuilder\KeyValue\ProductsWithoutElectronics
     */
    protected function getProductQueryBuilder()
    {
        return $this->factory->getExporterQueryBuilderKeyValueProductsWithoutElectronics();
    }

    /**
     * @param array $product
     * @return array
     */
    protected function transformProductToData($product)
    {
        //TODO transform or/and enrich data and/or keys
        $pairProductData = $product;
//        $pairProductData[self::STORAGEKEY_PRODUCT_SKU] = $sku = $product['sku'];;
//        $pairProductData[self::STORAGEKEY_PRODUCT_ATTRIBUTE_SET] = $this->getRimAttributeSetName();
//        $pairProductData[self::STORAGEKEY_PRODUCT_PRICE] = $product['price'];
//        $pairProductData[self::STORAGEKEY_PRODUCT_QUANTITY] = $product['quantity'];
//        $pairProductData[self::STORAGEKEY_PRODUCT_ID_CATALOG_PRODUCT] = $product['id_catalog_product'];

        return $pairProductData;
    }
}
