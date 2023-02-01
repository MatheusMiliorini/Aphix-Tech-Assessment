<?php

namespace App\Traits;


trait Fillable
{
    /**
     * The properties that can be filled in this object
     *
     * @var string[]
     */
    protected $fillable = [];

    /**
     * @return static[]
     */
    public static function createFromArray(array $items)
    {
        $objects = [];
        foreach ($items as $item) {
            $obj = new static();
            $obj->fill($item);
            $objects[] = $obj;
        }
        return $objects;
    }

    public function fill(array $data)
    {
        foreach ($data as $key => $value) {
            if (in_array($key, $this->fillable)) {
                $this->$key = $value;
            }
        }
    }
}
