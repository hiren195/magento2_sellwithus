<?php

namespace Magehiren\Sellwithus\Controller\Index;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\UrlInterface;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $session;
    protected $urlInterface;
    
    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Customer\Model\Session $customerSession
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        UrlInterface $urlInterface
    ) {
        $this->session = $customerSession;
        $this->urlInterface = $urlInterface;
        parent::__construct($context);
    }

    public function execute()
    {
        $post = (array) $this->getRequest()->getPost();

        if (!empty($post)) {
            $this->messageManager->addSuccessMessage('Sellwithus submitted successfully !');

            // Redirect to your form page
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/magehirensellwithus/index/sellwithus');

            return $resultRedirect;
        }
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}