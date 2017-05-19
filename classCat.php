<?php
/**
 * class Cat
 * parent class for Cat
 */

//namespace cat;

class Cat {
    //main variables
    public $catName;//string
    public $catWeight;//number
    public $catGender;//male or female
    public $catColoring;//calico, gray, brown, white, purple
    //public $catCurrentMood;//grumpy,sleeping,rowdy
    //public $catHairLength;//long or short haired
    //public $catCattitude;//bool

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

    /**
     * Return weight of cat
     */
    public function getWeight() {
        echo "The weight of this cat is $this->catWeight pounds. ";

        //create some conditional feedback to user about weight of cat
        //store the value of the cat's weight into a new variable
        $current_cat_weight = $this->catWeight;

        //compare the wieght of $current_cat_weight into an if/else
        if ( $current_cat_weight > 1 && $current_cat_weight < 99 ) {
            echo "Your cat is getting pretty big there. Keep an eye on the food intake!<br /><br />";
        } elseif ( $current_cat_weight > 100 && $current_cat_weight < 199 ) {
            echo "Oh wow, you got yourself a beefer! I bet this cat is eating good!<br /><br />";
        } elseif ( $current_cat_weight > 200 && $current_cat_weight < 299 ) {
            echo "This is a pretty fat lump you have here. What in the world are you feeding this thing?<br /><br />";
        } elseif ( $current_cat_weight > 300 && $current_cat_weight < 7065815501 ) {
            echo "Oh my lands! Take this puffer for a walk, esse!<br /><br />";
        } elseif ( $current_cat_weight > 7065815502 ) {
            echo "Real talk: your pug weighs more than the Star Ship Enterprise. What out for The Borg.<br /><br />";
        }

        return;
    }

    /**
     * Set gender of the cat
     * @param $gender
     */
    public function setGender($gender) {
        $this->catGender = $gender;

        return;
    }

    /**
     * Return gender of the cat
     */
    public function getGender() {
        //check if user forgot to input a gender
        //otherwise return gender of cat
        if ( $this->catGender == false ) {
            echo "$this->catName does not have a gender. It seems your cat is Gender Fluid, and we need to create a safe space without triggers for the cat. Speak to $this->catName about what pronouns you should use when speaking to your cat.<br /><br />";
        } else {
            echo "$this->catName is a $this->catGender.<br /><br />";
        }
        
        return;
    }

    public function setColoring($coloring) {
        $this->catColoring = $coloring;

        return;
    }

    public function getColoring() {
        echo "the color of $this->catName is $this->catColoring.";

        return;

        //return $this->catColoring;//why does this not return?
    }
}