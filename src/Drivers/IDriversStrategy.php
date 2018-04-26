<?php
/**
 * Created by PhpStorm.
 * User: mangueira
 * Date: 25/04/18
 * Time: 20:18
 */

namespace JM\SON\Drivers;

use JM\SON\Model;

interface IDriversStrategy
{
    public function save(Model $data);
    public function insert(Model $data);
    public function update(Model $data);
    public function select(array $data = []);
    public function delete(array $data);
    public function exec(string $query);
    public function first();
    public function all();
}