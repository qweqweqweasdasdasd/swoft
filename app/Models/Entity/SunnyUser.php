<?php declare(strict_types=1);


namespace App\Models\Entity;

use Swoft\Db\Annotation\Mapping\Column;
use Swoft\Db\Annotation\Mapping\Entity;
use Swoft\Db\Annotation\Mapping\Id;
use Swoft\Db\Eloquent\Model;


/**
 * 
 * Class SunnyUser
 *
 * @since 2.0
 *
 * @Entity(table="sunny_user")
 */
class SunnyUser extends Model
{
    /**
     * 
     * @Id()
     * @Column()
     *
     * @var int
     */
    private $id;

    /**
     * 
     *
     * @Column(name="mobile_char", prop="mobileChar")
     *
     * @var string|null
     */
    private $mobileChar;

    /**
     * 
     *
     * @Column(name="passwd_char", prop="passwdChar")
     *
     * @var string|null
     */
    private $passwdChar;

    /**
     * 
     *
     * @Column(name="create_time", prop="createTime")
     *
     * @var string|null
     */
    private $createTime;


    /**
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string|null $mobileChar
     *
     * @return self
     */
    public function setMobileChar(?string $mobileChar): self
    {
        $this->mobileChar = $mobileChar;

        return $this;
    }

    /**
     * @param string|null $passwdChar
     *
     * @return self
     */
    public function setPasswdChar(?string $passwdChar): self
    {
        $this->passwdChar = $passwdChar;

        return $this;
    }

    /**
     * @param string|null $createTime
     *
     * @return self
     */
    public function setCreateTime(?string $createTime): self
    {
        $this->createTime = $createTime;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getMobileChar(): ?string
    {
        return $this->mobileChar;
    }

    /**
     * @return string|null
     */
    public function getPasswdChar(): ?string
    {
        return $this->passwdChar;
    }

    /**
     * @return string|null
     */
    public function getCreateTime(): ?string
    {
        return $this->createTime;
    }

}
