<?php
declare(strict_types=1);
/**
 * BSS Commerce Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://bsscommerce.com/Bss-Commerce-License.txt
 *
 * @category   BSS
 * @package    Bss_CompanyAccount
 * @author     Extension Team
 * @copyright  Copyright (c) 2020 BSS Commerce Co. ( http://bsscommerce.com )
 * @license    http://bsscommerce.com/Bss-Commerce-License.txt
 */
namespace Bss\CompanyAccount\Controller\Adminhtml\Customer\Role;

use Bss\CompanyAccount\Api\SubRoleRepositoryInterface;
use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Psr\Log\LoggerInterface;

/**
 * Class Delete
 *
 * @package Bss\CompanyAccount\Controller\Adminhtml\Customer\Role
 */
class Delete extends Action implements HttpPostActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Bss_CompanyAccount::config_section';

    /**
     * @var SubRoleRepositoryInterface
     */
    private $roleRepository;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var JsonFactory
     */
    private $resultJsonFactory;

    /**
     * Delete constructor.
     *
     * @param SubRoleRepositoryInterface $roleRepository
     * @param LoggerInterface $logger
     * @param JsonFactory $resultJsonFactory
     * @param Action\Context $context
     */
    public function __construct(
        SubRoleRepositoryInterface $roleRepository,
        LoggerInterface $logger,
        JsonFactory $resultJsonFactory,
        Action\Context $context
    ) {
        $this->roleRepository = $roleRepository;
        $this->logger = $logger;
        $this->resultJsonFactory = $resultJsonFactory;
        parent::__construct($context);
    }

    /**
     * Delete role action
     */
    public function execute()
    {
        $error = false;
        try {
            $roleId = $this->getRequest()->getParam('id');
            if ((int)$roleId !== 0) {
                $this->roleRepository->deleteById((int)$roleId);
                $message = __('You deleted the role.');
            } else {
                $message = __('We can\'t delete this default admin role for you right now.');
            }
        } catch (\Exception $e) {
            $error = true;
            $message = __('We can\'t delete the role right now.');
            $this->logger->critical($e);
        }
        $resultJson = $this->resultJsonFactory->create();
        $resultJson->setData(
            [
                'message' => $message,
                'error' => $error,
            ]
        );

        return $resultJson;
    }
}
