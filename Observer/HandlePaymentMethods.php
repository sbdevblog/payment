<?php
/**
 * @copyright Copyright (c) sbdevblog (http://www.sbdevblog.com)
 */
namespace Sb\Payment\Observer;

use Magento\Framework\Event\ObserverInterface;

class HandlePaymentMethods implements ObserverInterface
{

    /**
     * Handle payment_method_is_active event
     *
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        if ($observer->getEvent()->getMethodInstance()->getCode()=="cashondelivery") {
            $checkResult = $observer->getEvent()->getResult();
            // pass true to enable & false to disable payment method
            $checkResult->setData('is_available', false);
            return;
        }
    }
}
