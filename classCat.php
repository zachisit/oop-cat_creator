<?php
/**
 * class Cat
 * parent class for Cat
 */

//namespace cat;

class Cat {
    //main variables
    public $catName;
    public $catWeight;

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
     * @param none
     */
    public function getName() {
        //if name of cat passed in, then run the following
        if ( $this->catName == false ) {
            echo "Woah. You have not named you cat! Why?<br /><br />";
        } else {
            echo "The name of your cat is $this->catName. What a pretty name!<br /><br />";
        }

        return;

    }

    /**
     * Set weight of cat
     * @param $weight
     */
    public function setWeight($weight) {
        $this->catWeight = $weight;

        return;
    }

    public function getWeight() {
        echo "The weight of this cat is $this->catWeight pounds. ";

        //create some conditional feedback to user about weight of cat
        //store the value of the cat's weight into a new variable
        $current_cat_weight = $this->catWeight;

        //compare the wieght of $current_cat_weight into an if/else
        //@TODO: build out into a better logic
        //@TODO: clean up this to compare between X and Y
        if ( $current_cat_weight < 99) {
            echo "Your cat is getting pretty big there. Keep an eye on the food intake!<br /><br />";
        } elseif ( $current_cat_weight > 100 ) {
            echo "Oh wow, you got yourself a beefer! I bet this cat is eating good!<br /><br />";
        } elseif ( $current_cat_weight > 200 ) {
            echo "This is a pretty fat lump you have here. What in the world are you feeding this thing?<br /><br />";
        } elseif ( $current_cat_weight > 300 ) {
            echo "Oh my lands! Take this puffer for a walk, esse!<br /><br />";
        } elseif ( $current_cat_weight > 7065815503 ) {
            echo "Real talk: your pug weighs more than the Star Ship Enterprise. What out for The Borg.<br /><br />";
        }

        return;
    }
}