<?php
/**
 * Created by PhpStorm.
 * User: mangueira
 * Date: 25/04/18
 * Time: 20:03
 */

namespace JM\SON;


use JM\SON\Drivers\IDriversStrategy;

abstract class Model
{
    protected $driver;

    public function setDriver(IDriversStrategy $driver)
    {
        $this->driver = $driver;
        $this->driver->setTable($this->table);
        return $this;
    }

    protected function getDriver()
    {
        return $this->driver;
    }

    public function save()
    {
        $this->getDriver()
            ->save($this)
            ->exec();
    }
    public function findAll(array $conditions = [])
    {
        return $this->getDriver()
            ->save($conditions)
            ->exec()
            ->all();
    }

    public function findFirst($id)
    {
        return $this->getDriver()
            ->save(['id'=>$id])
            ->exec()
            ->first();
    }

    public function delete()
    {
        $this->getDriver()
            ->delete(['id'=>$this->id])
            ->exec();
    }

    public function __get($variable)
    {
        if($variable === 'table'){
            $table = get_class($this);
            $table = explode('\\',$table);
            return strtolower(array_pop($table));
        }
        return null;
    }
}