<?php
class Form {
    private $action;
    private $method;
    private $fields = [];

    public function __construct($action = '#', $method = 'POST') {
        $this->action = $action;
        $this->method = $method;
    }

    public function addInput($name, $type = 'text', $label = '', $value = '', $attributes = []) {
        $this->fields[$name] = [
            'type' => $type,
            'label' => $label,
            'value' => $value,
            'attributes' => $attributes
        ];
    }

    public function renderForm() {
        $form = '<form action="' . $this->action . '" method="' . $this->method . '">';

        foreach ($this->fields as $name => $field) {
            $form .= '<div class="form-group">'; // Aggiungi la classe 'form-group' come wrapper per il campo di input
            if (!empty($field['label'])) {
                $form .= '<label for="' . $name . '">' . $field['label'] . '</label>';
            }
            if ($field['type'] == 'textarea') {
                $form .= '<textarea name="' . $name . '" id="' . $name . '"';

                foreach ($field['attributes'] as $attribute => $attrValue) {
                    $form .= ' ' . $attribute . '="' . $attrValue . '"';
                }
                $form .= '>' . $field['value'] . '</textarea>';
            } else {
                $form .= '<input type="' . $field['type'] . '" name="' . $name . '" id="' . $name . '" value="' . $field['value'] . '"';
                foreach ($field['attributes'] as $attribute => $attrValue) {
                    $form .= ' ' . $attribute . '="' . $attrValue . '"';
                }
                $form .= '>';
            }
            $form .= '</div>';
        }

        $form .= '<div><button type="submit">Submit</button></div>';
        $form .= '</form>';

        return $form;
    }
}

$myform = new Form('/process.php', 'POST');
$myform->addInput('name', 'text', 'Name: ', '', ['placeholder' => 'Your Full Name']);
$myform->addInput('surname', 'text', 'Surname: ', '', ['placeholder' => 'Your Surname']);
$myform->addInput('birthdate', 'date', 'Date of Birth: ', '', ['placeholder' => 'Enter your date of birth']);
$myform->addInput('email', 'email', 'Email: ', '', ['placeholder' => 'Enter your email']);
$myform->addInput('phone', 'text', 'Phone Number: ', '', ['placeholder' => 'Enter your phone number']);
$myform->addInput('message', 'textarea', 'Message: ', '', ['placeholder' => 'Your message here...', 'rows' => 4]);

// echo $myform->renderForm();
?>