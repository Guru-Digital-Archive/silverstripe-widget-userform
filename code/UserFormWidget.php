<?php

class UserFormWidget extends Widget
{

    private static $db      = array(
    );
    private static $has_one = array(
        'FormPage' => 'UserDefinedForm'
    );

    /**
     * @var string
     */
    private static $title = "User form Widget";

    /**
     * @var string
     */
    private static $cmsTitle = "Widget to display user forms";

    /**
     * @var string
     */
    private static $description = "Add user defined forms to your pages.";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab("Root.Main", new TextField('WidgetLabel', 'Widget Label'), "Enabled");
        $fields->addFieldToTab("Root.Main", new TextField('WidgetName', 'Widget Name'), "Enabled");


        return $fields;
    }

    public function Title()
    {
        return $this->WidgetLabel;
    }

    public function Form()
    {
        $form = false;
        if ($this->FormPage()) {
            $result = new UserDefinedForm_Controller($this->FormPage());
            $result->init();
            $form   = $result->Form();
        }
        return $form;
    }
}
