<?php
namespace Mattsmithdev;


class Product
{
    private $id;
    private $description;
    private $price;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function __toString()
    {
        $text = '';
        $text .= 'id = ' . $this->id;
        $text .= ', description = ' . $this->description;
        $text .= ', price = ' . $this->price;

        return $text;
    }


}