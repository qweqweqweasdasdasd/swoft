<?php declare(strict_types=1);


namespace App\Models;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 
 * Class Products
 *
 * @since 2.0
 *
 * @Entity(table="products")
 */
class Products extends Model
{
    /**
     * 
     * @Id()
     * @Column(name="prod_id", prop="prodId")
     *
     * @var int
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
     * 
     *
     * @Column(name="prod_click", prop="prodClick")
     *
     * @var int|null
     */
    private $prodClick;


    /**
     * @param int $prodId
     *
     * @return self
     */
    public function setProdId(int $prodId): self
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
     * @param int|null $prodClick
     *
     * @return self
     */
    public function setProdClick(?int $prodClick): self
    {
        $this->prodClick = $prodClick;

        return $this;
    }

    /**
     * @return int
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
    public function getProdClick(): ?int
    {
        return $this->prodClick;
    }

}
