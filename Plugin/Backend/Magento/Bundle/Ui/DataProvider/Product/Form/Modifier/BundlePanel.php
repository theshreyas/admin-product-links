<?php
declare(strict_types=1);

namespace Theshreyas\AdminProductLinks\Plugin\Backend\Magento\Bundle\Ui\DataProvider\Product\Form\Modifier;

use Magento\Framework\Stdlib\ArrayManager;

class BundlePanel
{
    /**
     * Constructor
     *
     * @param ArrayManager $arrayManager
     */
    public function __construct(
        private ArrayManager $arrayManager
    ) {
    }

    /**
     * Update html template
     *
     * @param \Magento\Bundle\Ui\DataProvider\Product\Form\Modifier\BundlePanel $subject
     * @param mixed $result
     * @param mixed $meta
     * @return mixed
     */
    public function afterModifyMeta(
        \Magento\Bundle\Ui\DataProvider\Product\Form\Modifier\BundlePanel $subject,
        $result,
        $meta
    ) {
        $path = 'bundle-items/children/bundle_options/children/record/children/product_bundle_container/children/';
        $fullPath = $path.'bundle_selections/children/record/children/name/arguments/data/config/elementTmpl';
        if ($this->arrayManager->exists($fullPath, $result)) {
            $result = $this->arrayManager->set($fullPath, $result, 'ui/form/element/html');
        }

        return $result;
    }
}
