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

            echo "New Cat created, the name of the cat is $this->catName.<br />";
        } else {
            echo "New Cat created, but does not have a name. Poor little dude. What will you call this new fluffy creature?<br />";
        }
    }

    /**
     * Return name of cat
     * @param none
     */
    public function getName() {
        return $this->catName;
    }

    /**
     * Set weight of cat
     * @param $weight
     */
    public function setWeight($weight) {
        //check input to make sure it is numeric
        if (is_numeric($weight)) {
            $this->catWeight = $weight;
        } else {
            echo "ERROR 34343: your input is not numeric. please fix.";
        }
    }

    /**
     * Return weight of cat
     */
    public function getWeight() {
        return $this->catWeight;
    }

    /**
     * Set gender of the cat
     * @param $gender
     */
    public function setGender($gender) {
        $this->catGender = $gender;
    }

    /**
     * Return gender of the cat
     */
    public function getGender() {
        return $this->catGender;
    }

    /**
     * Set color of cat
     * @param $coloring
     */
    public function setColoring($coloring) {
        $this->catColoring = $coloring;
    }

    public function setAllowedColorings() {
        $allowed_colorings = array (
            '#000000' => 'black',
            '#FF0000' => 'red',
            '#FFFF00' => 'yellow',
            '#0000FF' => 'blue'
        );
    }

    /**
     * Return color of cat
     */
    public function getColoring() {
        return $this->catColoring;
    }
}