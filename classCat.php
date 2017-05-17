<?php
/**
 * class Cat
 * parent class for Cat
 */

//namespace cat;

class Cat {
    //main variables
    public $catName;

    /**
     * Cat constructor.
     * @param $name
     */
    public function __construct($name)
    {
        //if name of cat passed in, then run the following
        if (isset($name)) {
            $this->catName = $name;

            echo "New Cat created, the name of the cat is $this->catName";
        } else {
            echo "New Cat created, but does not have a name. Poor little dude. What will you call this new fluffy creature?";
        }

        return;
    }
}