<?php
/**
 * class Cat
 * parent class for Cat
 */

namespace Cat;

class Cat {
    //main variables
    private $catName;//string name of cat
    private $catWeight;//number weight of cat
    private $catGender;//string gender of cat
    private $catColoring;//string color of cat
    private $catCurrentMood;//string mood of cat
    private $catHairLength;//string of hair length of cat
    private $catCattitude = false;//bool

    /**
     * Cat constructor.
     * @param $name
     */
    public function __construct($name)
    {
        //pass in name, if no name then set to null
        $this->catName = $name ?? null;
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
        $this->catGender = strtolower($gender);

        //check and make sure input matches array of
        //approved genders in the approved gender method
        if ( !isset( $this->setAllowedGenders()[$this->catGender] ) ) {
            echo "ERROR 90990: Your gender <strong>$gender</strong> is not an approved gender. Please fix. ";
            return;
        }

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
     * @return array
     */
    public function setAllowedGenders() {
        //list approved genders
        $approved_gender = array (
            'male' => 'him',
            'female' => 'her',
            'gender fluid' => 'it'
        );

        return $approved_gender;
    }

    /**
     * Check current Gender to return pronoun to be used
     * @return null|string
     */
    public function returnGenderPronounUsage() {
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
            case 'gender fluid':
                $current_gender = "it";
                return $current_gender;
                break;
        }
    }

    /**
     * Check if the supplied gender matches approved genders
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