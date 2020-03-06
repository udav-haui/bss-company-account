<?php
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
namespace Bss\CompanyAccount\Model;

use Bss\CompanyAccount\Api\Data\SubRoleInterface;
use Bss\CompanyAccount\Model\ResourceModel\SubRole as ResourceModel;
use Magento\Framework\Model\AbstractModel;

/**
 * Class SubRole
 *
 * @package Bss\CompanyAccount\Model
 */
class SubRole extends AbstractModel implements SubRoleInterface
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * Get role id
     *
     * @return int
     */
    public function getRoleId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Set role id
     *
     * @param int $id
     * @return SubRole
     */
    public function setRoleId(int $id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Get role name
     *
     * @return string
     */
    public function getRoleName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set name for role
     *
     * @param string $name
     * @return SubRole|void
     */
    public function setRoleName(string $name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get permissions
     *
     * @return mixed|string
     */
    public function getRoleType()
    {
        return $this->getData(self::TYPE);
    }

    /**
     * Set permissions
     *
     * @param string $typeStr
     * @return SubRole|void
     */
    public function setRoleType(string $typeStr)
    {
        return $this->setData(self::TYPE, $typeStr);
    }

    /**
     * Get max order per day
     *
     * @return int|mixed
     */
    public function getMaxOrderPerDay()
    {
        return $this->getData(self::MAX_ORDER_PER_DAY);
    }

    /**
     * Set max order per day
     *
     * @param int $number
     * @return SubRole|void
     */
    public function setMaxOrderPerDay(int $number)
    {
        return $this->setData(self::MAX_ORDER_PER_DAY, $number);
    }

    /**
     * Get max order amount
     *
     * @return float|mixed
     */
    public function getMaxOrderAmount()
    {
        return $this->getData(self::MAX_ORDER_AMOUNT);
    }

    /**
     * Set max order amount
     *
     * @param float $number
     * @return SubRole|void
     */
    public function setMaxOrderAmount(float $number)
    {
        return $this->setData(self::MAX_ORDER_AMOUNT, $number);
    }
}
