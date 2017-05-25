<?php
/**
 * class Cat
 * parent class for Cat
 *
 *
 * @comment From Max:
 * All of your pre-function comment blocks should include "@return type" where type is a pipe separated list of return
 * types, e.g. getName() should include "@return string|null"
 */

namespace Cat;

class Cat {
    //main variables
    private $catName;//string
    private $catWeight;//number
    private $catGender;//male or female

    /** @comment Shouldn't these be the value for the current cat, not array? */
    private $catColoring;//array of approved colors
    private $catCurrentMood;//array of approved moods
    private $catHairLength;//array of approved hair lengths
    /********************************/

    /** @comment bool vars should only be true/false (not 0/1) */
    private $catCattitude = 0;//bool

    /**
     * Cat constructor.
     * @param $name
     */
    public function __construct($name)
    {
        //if name of cat passed in, then run the following

        /** @comment If you remove the echos, this entire if/else block can be shortened to:
         *  $this->catName = $name ?? null;
         */
        if (isset($name)) {
            $this->catName = $name;

            /** @comment echoing inside a constructor is bad practice. */
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
        /** consider changing this to:
         * return $this->catName ?? ''
         * You might do this because you want to be sure that you are always returning a string.  If catName was never
         * set you might return null.
         */
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
        } //if input is ok, then set the input to the variable
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
        /** @comment Don't you want to validate $gender? */
        $this->catGender = strtolower($gender);

        /** @comment, please try to keep all lines <= 120 characters */
        //note: it will not be needed to use strtolower in later phases of this application, since when user will fill out the input form to create the cat the gender options will be radio buttons and not text input fields. but good to test and use this phase of the app
    }

    /**
     * Return gender of the cat
     */
    public function getGender() {
        return $this->catGender;
    }

    /**
     * Set list approved genders
     * @comment Consider replacing this method with a private static class variable.
     * @return array
     */
    public function setAllowedGenders() {
        //list approved genders
        $approved_gender = array (
            'male' => 0,
            'female' => 1,
            'gender fluid' => 2
        );

        return $approved_gender;
    }

    /**
     * Check current Gender to return pronoun to be used
     * @return null|string
     */
    public function returnGenderPronounUsage() {
        /** @comment - Your note here is spot on :) */
        //note: i guess instead of writing a switch to determine proper pronoun usage, i could change the setAllowedGender $approved_gender array to be 'male' => 'him' - but for now i am happy with this implementation
        //var to get the current gender
        $existing_pronoun = $this->getGender();
        //var to be used in our switch and to be returned
        $current_gender = NULL;

        switch ($existing_pronoun) {
            case 'female':
                $current_gender = "her";
                return $current_gender;
                break;
            case 'male':
                $current_gender = "him";
                return $current_gender;
                break;
            case 'gender fluid': /** @comment instead of case 'gender fluid':, consider just saying default: */
                $current_gender = "it";
                return $current_gender;
                break;
        }
    }

    /**
     * Check if the supplied gender matches approved genders
     * @comment Validation methods should generally be private and run inside the setter.
     * @return bool
     */
    public function checkIsGenderApproved() {
        return isset( $this->setAllowedGenders()[$this->catGender] );
    }

    /**
     * Set color of cat
     * @param $coloring
     */
    public function setColoring($coloring) {
        /** @comment You should validate the coloring before setting it */
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
     * @comment consider adding a parameter to this function, something like:
     * getColoring($context = 'name')
     * Then accept name or color_code as the context and you can do getColoring('color_code') to return the hex code
     * By default you'd still return the name
     */
    public function getColoring() {
        return $this->catColoring;
    }

    /**
     * Check if the supplied color matches the approved cat colors
     * @comment Same comment as on line 152
     * @return bool
     */
    public function checkIsColorApproved() {
        return isset( $this->setAllowedColorings()[$this->catColoring] );
    }

    /**
     * Set the mood of the cat
     * @param $mood
     */
    public function setMood($mood) {
        $this->catCurrentMood = $mood;
    }

    /**
     * Set list of approved moods
     * @return array
     */
    public function setApprovedMood() {
        //list of approved moods
        $approved_moods = array(
            'grumpy' => '0',
            'sleepy' => '1',
            'rowdy' => '2',
            'thirsty' => '3',
            'hungry' => '4'
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
     * Check if supplied mood matches approved mood list
     * @return bool
     */
    public function checkIsMoodApproved() {
        return isset( $this->setApprovedMood()[$this->catCurrentMood] );
    }

    /**
     * Set length of hair for cat
     * @param $hairlength
     * @return mixed
     */
    public function setHairLength($hairlength) {
        /** @comment this will always return true, was that intentional? */
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

    /**
     * Set if cat has catitude or not
     * @param $catitude
     * @return mixed
     * @reference http://pink73.tripod.com/cats/catitude2.jpg
     * @comment Same comment as on line 252
     */
    public function setHasCatitude($catitude) {
        return $this->catCattitude = $catitude;
    }

    /**
     * Return if cat has catitude
     * @return int
     */
    public function getCatitudeStatus() {
        return $this->catCattitude;
    }
}