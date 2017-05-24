<?php
/**
 * class Cat
 * parent class for Cat
 */

namespace Cat;

class Cat {
    //main variables
    private $catName;//string
    private $catWeight;//number
    private $catGender;//male or female
    private $catColoring;//array of approved colors
    private $catCurrentMood;//array of approved mood
    private $catHairLength;//long or short haired
    //private $catCattitude;//bool

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
        } //check if input is exactly zero
        elseif ( $weight == 0 ) {
            echo "ERROR 98998: The weight of your cat should be more than zero. Please update.";
        } //set the input to the variable
        else {
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
        //list of approved cat colors
        //related to hex colors
        $allowed_colorings = array (
            'black' => '#000000',
            'gray' => '#808080',
            'brown' => '#A5682A',
            'calico' => '#D5B185',
            'white' => '#FFFFFF'
        );

        return $allowed_colorings;
    }

    /**
     * Return color of cat
     */
    public function getColoring() {
        return $this->catColoring;
    }

    /**
     * Check if the supplied color matches the approved cat colors
     * @return bool
     */
    public function checkIsColorApproved() {
        //return isset($array[$key])
        return isset( $this->setAllowedColorings()[$this->catColoring] );
    }

    /**
     * Set the mood of the cat
     * @param $mood/
     */
    public function setMood($mood) {
        $this->catCurrentMood = $mood;
    }

    /**
     * Set list of approved moods
     * @return array
     */
    public function checkIsMoodApproved() {
        //list of approved moods
        $approved_moods = array(
            'grumpy',
            'sleepy',
            'rowdy',
            'thirsty',
            'hungry'
        );

        return $approved_moods;
    }

    /**
     * Return current mood of cat
     * @return mixed
     */
    public function getMood() {
        return $this->catCurrentMood;
    }

    /**
     * Set length of hair for cat
     * @param $hairlength
     * @return mixed
     */
    public function setHairLength($hairlength) {
        return $this->catHairLength = $hairlength;
    }

    /**
     * Check if supplied hair length is approved
     * @return array
     */
    public function checkIsHairLengthApproved() {
        $approved_hairlength = array (
            'short',
            'long',
            'hairless'
        );

        return $approved_hairlength;
    }

    /**
     * Return hair length
     * @return mixed
     */
    public function getHairLength() {
        return $this->catHairLength;
    }
}