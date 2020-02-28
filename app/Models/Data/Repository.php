<?php


namespace App\Models\Data;


use Swoft\Redis\Redis;

class Repository
{
    /**
     * @var int
     */
    protected $ttl = 10;

    protected $model;

    protected $tag;

    public function getTtl()
    {
        return $this->ttl;
    }

    public function setTtl(int $time)
    {
        $this->ttl = $time;
        return $this;
    }

    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setTag(string $tag)
    {
        $this->tag = $tag;
        return $this;
    }

    public function getTag()
    {
        return $this->tag;
    }

    public function findById(int $id)
    {
        return $this->remember($this->getTag().":".$id,function() use($id){
            return $this->getModel()::find($id);
        });
    }

    public function remember($key,\Closure $entity)
    {
        $value = Redis::get($key);
        if(empty($value)){
            $value = $entity();
            if(!empty($value)){
                Redis::set($key,$value,$this->getTtl());
            }
        }

        return $value;
    }

}
