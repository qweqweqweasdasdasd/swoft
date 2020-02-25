<?php declare(strict_types=1);


namespace App\Models;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 *
 * Class OrderDetailValidator
 *
 * @since 2.0
 *
 * @Entity(table="order_detail")
 */
class OrderDetail extends Model
{
    /**
     *
     * @Id(incrementing=false)
     * @Column(name="order_did", prop="orderDid")
     *
     * @var int
     */
    private $orderDid;

    /**
     *
     *
     * @Column(name="order_no", prop="orderNo")
     *
     * @var string|null
     */
    private $orderNo;

    /**
     *
     *
     * @Column(name="user_id", prop="userId")
     *
     * @var int|null
     */
    private $userId;

    /**
     *
     *
     * @Column(name="prod_id", prop="prodId")
     *
     * @var int|null
     */
    private $prodId;

    /**
     *
     *
     * @Column(name="prod_name", prop="prodName")
     *
     * @var string|null
     */
    private $prodName;

    /**
     *
     *
     * @Column(name="prod_price", prop="prodPrice")
     *
     * @var float|null
     */
    private $prodPrice;

    /**
     * 折扣 1 -10
     *
     * @Column()
     *
     * @var int|null
     */
    private $discount;

    /**
     *
     *
     * @Column(name="prod_num", prop="prodNum")
     *
     * @var int|null
     */
    private $prodNum;

    /**
     *
     *
     * @Column()
     *
     * @var float|null
     */
    private $totalmoney;

    /**
     *
     *
     * @Column(name="prod_remark", prop="prodRemark")
     *
     * @var string|null
     */
    private $prodRemark;


    /**
     * @param int $orderDid
     *
     * @return self
     */
    public function setOrderDid(int $orderDid): self
    {
        $this->orderDid = $orderDid;

        return $this;
    }

    /**
     * @param string|null $orderNo
     *
     * @return self
     */
    public function setOrderNo(?string $orderNo): self
    {
        $this->orderNo = $orderNo;

        return $this;
    }

    /**
     * @param int|null $userId
     *
     * @return self
     */
    public function setUserId(?int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @param int|null $prodId
     *
     * @return self
     */
    public function setProdId(?int $prodId): self
    {
        $this->prodId = $prodId;

        return $this;
    }

    /**
     * @param string|null $prodName
     *
     * @return self
     */
    public function setProdName(?string $prodName): self
    {
        $this->prodName = $prodName;

        return $this;
    }

    /**
     * @param float|null $prodPrice
     *
     * @return self
     */
    public function setProdPrice(?float $prodPrice): self
    {
        $this->prodPrice = $prodPrice;

        return $this;
    }

    /**
     * @param int|null $discount
     *
     * @return self
     */
    public function setDiscount(?int $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * @param int|null $prodNum
     *
     * @return self
     */
    public function setProdNum(?int $prodNum): self
    {
        $this->prodNum = $prodNum;

        return $this;
    }

    /**
     * @param float|null $totalmoney
     *
     * @return self
     */
    public function setTotalmoney(?float $totalmoney): self
    {
        $this->totalmoney = $totalmoney;

        return $this;
    }

    /**
     * @param string|null $prodRemark
     *
     * @return self
     */
    public function setProdRemark(?string $prodRemark): self
    {
        $this->prodRemark = $prodRemark;

        return $this;
    }

    /**
     * @return int
     */
    public function getOrderDid(): ?int
    {
        return $this->orderDid;
    }

    /**
     * @return string|null
     */
    public function getOrderNo(): ?string
    {
        return $this->orderNo;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @return int|null
     */
    public function getProdId(): ?int
    {
        return $this->prodId;
    }

    /**
     * @return string|null
     */
    public function getProdName(): ?string
    {
        return $this->prodName;
    }

    /**
     * @return float|null
     */
    public function getProdPrice(): ?float
    {
        return $this->prodPrice;
    }

    /**
     * @return int|null
     */
    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    /**
     * @return int|null
     */
    public function getProdNum(): ?int
    {
        return $this->prodNum;
    }

    /**
     * @return float|null
     */
    public function getTotalmoney(): ?float
    {
        return $this->totalmoney;
    }

    /**
     * @return string|null
     */
    public function getProdRemark(): ?string
    {
        return $this->prodRemark;
    }

}
