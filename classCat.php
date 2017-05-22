<?php
/**
 * class Cat
 * parent class for Cat
 */

//namespace cat;

class Cat {
    //main variables
    protected $catName;//string
    protected $catWeight;//number
    protected $catGender;//male or female
    protected $catColoring;//calico, gray, brown, white, purple
    //protected $catCurrentMood;//grumpy,sleeping,rowdy
    //protected $catHairLength;//long or short haired
    //protected $catCattitude;//bool

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
        if ( !is_numeric($weight) ) {
            echo "ERROR 34343: Your input is not numeric. Please fix.";
        } elseif ( $weight == 0 ) {
            //check if input is exactly zero
            echo "The weight of your cat should be more than zero. Please update.";
        } else {
            //set the input to the variable
            $this->catWeight = $weight;
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

    /**
     * Set list of allowed cat colorings
     */
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