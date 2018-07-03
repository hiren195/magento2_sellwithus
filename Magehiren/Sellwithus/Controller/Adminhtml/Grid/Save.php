<?php
 
/**
 * Grid Admin Record Save Controller.
 * @category  Magehiren
 * @package   Magehiren_Sellwithus
 * @author    Magehiren
 */
namespace Magehiren\Sellwithus\Controller\Adminhtml\Grid;
 
class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Magehiren\Grid\Model\sellwithusFactory
     */
    var $sellwithusFactory;
 
    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magehiren\Sellwithus\Model\GridFactory $sellwithusFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magehiren\Sellwithus\Model\SellwithusFactory $sellwithusFactory
    ) {
        parent::__construct($context);
        $this->sellwithusFactory = $sellwithusFactory;
    }
 
    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('sellwithus/grid/addrow');
            return;
        }
        try {
            $rowData = $this->sellwithusFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('sellwithus/grid/index');
    }
 
    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magehiren_Sellwithus::save');
    }
}