<?php
/**
 * classValidation.php
 * Validation class for new record form
 */

class Validation
{
    public $formData = [];
    public $message = [];
    public $validate;

    /**
     * Validation constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->formData = $data;

        $this->rules($data);
    }

    /**
     * Rules
     * run through the submitted data, output errors
     * or output success message
     * @param $data
     */
    public function rules($data)
    {
        $missingData = [];
        $this->message = $missingData;

        foreach ($data as $key => $value)
        {
            if ($value == null) {
               array_push($missingData, $key);
            }
        }

        $this->displayMessage($missingData);
    }

    /**
     * Display A Message
     * will direct to either an 'error' or 'success' method
     * @param $missingData
     */
    public function displayMessage($missingData)
    {
        $this->message = $missingData;

        if ($missingData == null) {
            $this->displaySuccessMessage();
        } else {
            $this->displayErrorMessage($missingData);
        }
    }

    /**
     * Display Generic Success Message
     */
    public function displaySuccessMessage()
    {
        echo '<div id="message" class="success"><p>New Cat is now added. Review all cats here <a href="index.php">here</a></p></div>';
    }

    /**
     * Display A Message With Errors
     * @param $missingData
     */
    public function displayErrorMessage($missingData) {
        echo '<div id="message" class="error">';

        foreach ($missingData as $key => $value)
        {
            echo '<p>You are missing input for ' . $value . '</p>';
        }

        echo '</div>';
    }
}