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

            echo "New Cat created, the name of the cat is $this->catName.<br /><br />";
        } else {
            echo "New Cat created, but does not have a name. Poor little dude. What will you call this new fluffy creature?<br /><br />";
        }

        return;
    }

    /**
     * Return name of cat
     */
    public function getName() {
        //if name of cat passed in, then run the following
        if ( $this->catName == false ) {
            echo "Woah. You have not named you cat! Why<br /><br />?";
        } else {
            echo "The name of your cat is $this->catName. What a pretty name!<br /><br />";
        }

        return;

    }
}