<?php
/**
 * Product in category grid
 */
namespace Theshreyas\AdminProductLinks\Block\Adminhtml\Category\Tab;

use Magento\Backend\Block\Widget\Grid\Extended;

class Product extends \Magento\Catalog\Block\Adminhtml\Category\Tab\Product
{
    /**
     * Prepare columns.
     *
     * @return Extended
     */
    protected function _prepareColumns()
    {
        parent::_prepareColumns();
        $this->addColumnAfter(
            'name',
            [
                'header' => __('Name'),
                'renderer'  => \Theshreyas\AdminProductLinks\Block\Adminhtml\ProductNameUrlRenderer::class,
                'index' => 'name'
            ],
            'entity_id'
        );
        $this->addColumnsOrder('name', 'entity_id')->sortColumnsByOrder();
        return $this;
    }
}
