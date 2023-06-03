<?php
/**
 * @author Samuel Alderete Rayón <sammymalware@gmail.com>
 */

/**
 * Constructor de formulario
 * * Preconfigurado para Boostrap 4
 * * Puede funcionar para cualquier framework en realidad
 */
class FormBuilder
{
    protected string $inputCssClass = 'form-control';

    protected string $smallTagCssClass = 'form-text text-muted mb-2';

    protected string $invalidFeedbackCssClass = 'invalid-feedback';

    protected string $checkboxInputCssClass = 'custom-control-input';

    protected string $checkboxLabelCssClass = 'custom-control-label';

    protected string $checkboxContainerCssClass = 'custom-control custom-checkbox custom-switch mb-2';

    protected string $radioInputCssClass = 'custom-control-input';

    protected string $radioLabelCssClass = 'custom-control-label';

    protected string $radioContainerCssClass = 'custom-control custom-radio mb-2';

    protected string $selectInputCssClass = 'custom-select mb-2';

    protected string $submitButtonCssClass = 'btn btn-primary mt-3';

    protected string $formId = '';

    protected string $html = '';

    protected array $values = [];

    protected string $action = '';

    protected string $method =  '';

    private array $allowedInputAttributes = [
        'accept',
        'alt',
        'autocomplete',
        'autofocus',
        'checked',
        'dirname',
        'disabled',
        'form',
        'formaction',
        'formenctype',
        'formmethod',
        'formnovalidate',
        'formtarget',
        'height',
        'list',
        'max',
        'maxlength',
        'min',
        'minlength',
        'multiple',
        'pattern',
        'placeholder',
        'readonly',
        'required',
        'size',
        'src',
        'step',
        'width',
    ];

    public function __construct($id = '', $method = '', $action = '')
    {
        $id = !empty($id) ? "id=\"$id\"" : "";
        $method = !empty($method) ? "method=\"$method\"" : "";
        $action = !empty($action) ? "action=\"$action\"" : "";
        $openTag = "<form $id $method $action >";
        $this->formId = $id;
        $this->html .= $openTag;
    }

    // Setters

    /**
     * Set the value of values
     * * Valores por defecto del formulario
     * @param array $values
     * 
     * @return self
     */
    public function setValues(array $values): self
    {
        $this->values = $values;

        return $this;
    }

    /**
     * Set the value of inputCssClass
     * * Clase CSS para las etiquetas <input>
     * * Aplica para los tipos: date, datetime-local, email, month, number, password, tel, text, time, url, week
     * @param mixed $inputCssClass
     * 
     * @return self
     */
    public function setInputCssClass($inputCssClass): self
    {
        $this->inputCssClass = $inputCssClass;

        return $this;
    }

    /**
     * Set the value of smallTagCssClass
     * * Clase CSS para la descripción del campo
     * @param mixed $smallTagCssClass
     * 
     * @return self
     */
    public function setSmallTagCssClass($smallTagCssClass): self
    {
        $this->smallTagCssClass = $smallTagCssClass;

        return $this;
    }

    /**
     * Set the value of submitButtonCssClass
     * * Clase CSS para el botón de envío
     */
    public function setSubmitButtonCssClass(string $submitButtonCssClass): self
    {
        $this->submitButtonCssClass = $submitButtonCssClass;

        return $this;
    }

    /**
     * Set the value of selectInputCssClass
     * * Clase CSS para la caja de selección
     * 
     */
    public function setSelectInputCssClass(string $selectInputCssClass): self
    {
        $this->selectInputCssClass = $selectInputCssClass;

        return $this;
    }

    /**
     * Set the value of invalidFeedbackCssClass
     * * Clase CSS para la capa de feedback inválido
     */
    public function setInvalidFeedbackCssClass(string $invalidFeedbackCssClass): self
    {
        $this->invalidFeedbackCssClass = $invalidFeedbackCssClass;

        return $this;
    }

    /**
     * Set the value of checkboxInputCssClass
     * * Clase CSS para la casilla de verificación
     */
    public function setCheckboxInputCssClass(string $checkboxInputCssClass): self
    {
        $this->checkboxInputCssClass = $checkboxInputCssClass;

        return $this;
    }

    /**
     * Set the value of checkboxLabelCssClass
     * * Clase CSS para la etiqueta <label> de la casilla de verificación
     */
    public function setCheckboxLabelCssClass(string $checkboxLabelCssClass): self
    {
        $this->checkboxLabelCssClass = $checkboxLabelCssClass;

        return $this;
    }

    /**
     * Set the value of checkboxContainerCssClass
     * * Clase CSS para el contenedor <div> de la casilla de verificación
     */
    public function setCheckboxContainerCssClass(string $checkboxContainerCssClass): self
    {
        $this->checkboxContainerCssClass = $checkboxContainerCssClass;

        return $this;
    }

    /**
     * Set the value of radioInputCssClass
     * * Clase CSS para el <input> tipo radio
     */
    public function setRadioInputCssClass(string $radioInputCssClass): self
    {
        $this->radioInputCssClass = $radioInputCssClass;

        return $this;
    }

    /**
     * Set the value of radioLabelCssClass
     * * Clase CSS para la etiqueta <label> del <input> tipo radio
     */
    public function setRadioLabelCssClass(string $radioLabelCssClass): self
    {
        $this->radioLabelCssClass = $radioLabelCssClass;

        return $this;
    }

    /**
     * Set the value of radioContainerCssClass
     * * Clase CSS para el contenedor <div> del <input> tipo radio
     */
    public function setRadioContainerCssClass(string $radioContainerCssClass): self
    {
        $this->radioContainerCssClass = $radioContainerCssClass;

        return $this;
    }
    
    /**
     * Retorna el formulario construido
     * @return string
     */
    public function get(): string
    {
        $this->html .= "</form>";
        return $this->html;
    }

    /**
     * Obtiene el valor predefinido para un campo
     * @param mixed $name
     * 
     * @return string
     */
    protected function getInputValue($name): string
    {
        if (isset($this->values[$name])) {
            return "value=\"{$this->values[$name]}\"";
        }
        return '';
    }

    /**
     * Obtiene el estado predefinido para un campo de tipo checkbox
     * @param mixed $name Nombre del campo
     * 
     * @return string
     */
    protected function getChecked($name): string
    {
        if (isset($this->values[$name])) {
            $checked = intval($this->values[$name]) == 1 ? 'checked' : '';
            return $checked;
        }
        return '';
    }

    /**
     * Obtiene el estado predefinido para un campo de tipo checkbox
     * @param mixed $name Nombre del campo
     * @param mixed $value Valor a comparar
     * 
     * @return string
     */
    protected function getCheckedRadio($name, $value): string
    {
        if (isset($this->values[$name])) {
            $checked = $this->values[$name] == $value ? 'checked' : '';
            return $checked;
        }
        return '';
    }

    /**
     * Procesa los atributos para una etiqueta <input>
     * * Omite type, name y value
     * @param array $attributes
     * 
     * @return string
     */
    protected function processInputAttributes(array $attributes): string
    {
        $attributesString = "";
        foreach ($attributes as $key => $value) {
            if (in_array($key, $this->allowedInputAttributes) || in_array($value, $this->allowedInputAttributes)) {
                $html = '';
                if (gettype($key) == 'string') {
                    $html = "$key=\"$value\"";
                } else {
                    $html = "$value";
                }
                $attributesString .= " $html";
            }
        }
        return $attributesString;
    }

    /**
     * Genera un campo con etiqueta <input>
     * @param string $type date|datetime-local|email|month|number|password|tel|text|time|url|week
     * @param string $name
     * @param string $label
     * @param string $description
     * @param array $attributes
     * @param string $invalidFeedback Mensaje de validación (inválido)
     * 
     * @return self
     */
    protected function addInputField(string $type, string $name, string $label, string $description = '', array $attributes = [], string $invalidFeedback = ''): self
    {
        $id = $name;
        $value = $this->getInputValue($name);
        $describedBy = !empty($description) ? " aria-describedby=\"$id-help\"" : '';
        $smallTag = !empty($description) ? "<small id=\"$id-help\" class=\"$this->smallTagCssClass\">$description</small>" : "";
        $attributesString = $this->processInputAttributes($attributes);
        $invalid = "<div id=\"$id-invalid-feedback\" class=\"$this->invalidFeedbackCssClass\">$invalidFeedback</div>";
        $inputHtml = "<label for=\"$id\">$label</label>";
        $inputHtml .= "<input name=\"$name\" type=\"$type\" class=\"$this->inputCssClass\" id=\"$id\" $value $describedBy $attributesString>$invalid";
        $inputHtml .= $smallTag;
        $this->html .= $inputHtml;
        return $this;
    }

    /**
     * Agrega un campo checkbox
     * * Agrega un campo oculto con valor de 0 con el mismo name
     * @param string $name
     * @param string $label
     * @param array $attributes
     * 
     * @return self
     */
    public function addCheckboxField(string $name, string $label, array $attributes = []): self
    {
        $id = $name;
        $checked = $this->getChecked($name);
        $attributesString = $this->processInputAttributes($attributes);
        $inputHtml = "<div class=\"{$this->checkboxContainerCssClass}\">";
        $inputHtml .= "<input type=\"hidden\" value=\"0\">";
        $inputHtml .= "<input name=\"$name\" type=\"checkbox\" class=\"{$this->checkboxInputCssClass}\" id=\"$id\" $checked $attributesString>";
        $inputHtml .= "<label class=\"{$this->checkboxLabelCssClass}\" for=\"$id\">$label</label>";
        $inputHtml .= "</div>";
        $this->html .= $inputHtml;
        return $this;
    }

    public function addRadioField(string $name, string $label, string $value, string $idSuffix, array $attributes = []): self
    {
        $id = "{$name}-{$idSuffix}";
        $checked = $this->getCheckedRadio($name, $value);
        $attributesString = $this->processInputAttributes($attributes);
        $inputHtml = "<div class=\"{$this->radioContainerCssClass}\">";
        $inputHtml .= "<input name=\"$name\" type=\"radio\" class=\"{$this->radioInputCssClass}\" id=\"$id\" $checked $attributesString value=\"$value\">";
        $inputHtml .= "<label class=\"{$this->radioLabelCssClass}\" for=\"$id\">$label</label>";
        $inputHtml .= "</div>";
        $this->html .= $inputHtml;
        return $this;
    }

    /**
     * Agrega un campo oculto
     * @param string $name
     * 
     * @return self
     */
    public function addInputHiddenField(string $name): self
    {
        $id = $name;
        $value = $this->getInputValue($name);
        $inputHtml = "<input name=\"$name\" type=\"hidden\" id=\"$id\" $value>";
        $this->html .= $inputHtml;
        return $this;
    }

    /**
     * Agrega una etiqueta <div>
     * * La función closure es para agregar los demás campos y/o más <div> dentro de la capa
     * @param callable $fun
     * @param string $cssClass
     * 
     * @return self
     */
    public function addDiv(callable $fun, string $cssClass = ''): self
    {
        $cssClass = !empty($cssClass) ? "class=\"$cssClass\"" : "";
        $this->html .= "<div $cssClass>";
        $fun($this);
        $this->html .= "</div>";
        return $this;
    }

    /**
     * Agrega un campo de texto
     * @param string $name
     * @param string $label
     * @param string $description
     * @param array $attributes
     * @param string $invalidFeedback Mensaje de validación (inválido)
     * 
     * @return self
     */
    public function addTextField(string $name, string $label, string $description = '', array $attributes = [], string $invalidFeedback = ''): self
    {
        $this->addInputField('text', $name, $label, $description, $attributes, $invalidFeedback);
        return $this;
    }

    /**
     * Agrega un campo <textarea>
     * @param string $name
     * @param string $label
     * @param string $description
     * @param int $rows
     * @param array $attributes
     * @param string $invalidFeedback
     * 
     * @return self
     */
    public function addTextAreaField(string $name, string $label, string $description = '', int $rows = 3, array $attributes = [], string $invalidFeedback = ''): self
    {
        $id = $name;
        $value = $this->getInputValue($name);
        $describedBy = !empty($description) ? " aria-describedby=\"$id-help\"" : '';
        $smallTag = !empty($description) ? "<small id=\"$id-help\" class=\"$this->smallTagCssClass\">$description</small>" : "";
        $attributesString = $this->processInputAttributes($attributes);
        $invalid = "<div id=\"$id-invalid-feedback\" class=\"$this->invalidFeedbackCssClass\">$invalidFeedback</div>";
        $inputHtml = "<label for=\"$id\">$label</label>";
        $inputHtml .= "<textarea name=\"$name\" class=\"$this->inputCssClass\" id=\"$id\" rows=\"$rows\" $describedBy $attributesString>$value</textarea>$invalid";
        $inputHtml .= $smallTag;
        $this->html .= $inputHtml;
        return $this;
    }

    /**
     * Agrega un campo de contraseña
     * @param string $name
     * @param string $label
     * @param string $description
     * @param array $attributes
     * @param string $invalidFeedback Mensaje de validación (inválido)
     * 
     * @return self
     */
    public function addPasswordField(string $name, string $label, string $description = '', array $attributes = [], string $invalidFeedback = ''): self
    {
        $this->addInputField('password', $name, $label, $description, $attributes, $invalidFeedback);
        return $this;
    }

    /**
     * Agrega un campo de fecha
     * @param string $name
     * @param string $label
     * @param string $description
     * @param array $attributes
     * @param string $invalidFeedback Mensaje de validación (inválido)
     * 
     * @return self
     */
    public function addDateField(string $name, string $label, string $description = '', array $attributes = [], string $invalidFeedback = ''): self
    {
        $this->addInputField('date', $name, $label, $description, $attributes, $invalidFeedback);
        return $this;
    }

    /**
     * Agrega un campo de fecha y tiempo: datetime-local
     * @param string $name
     * @param string $label
     * @param string $description
     * @param array $attributes
     * @param string $invalidFeedback Mensaje de validación (inválido)
     * 
     * @return self
     */
    public function addDateTimeField(string $name, string $label, string $description = '', array $attributes = [], string $invalidFeedback = ''): self
    {
        $this->addInputField('datetime-local', $name, $label, $description, $attributes, $invalidFeedback);
        return $this;
    }

    /**
     * Agrega un campo de dirección de correo electrónico
     * @param string $name
     * @param string $label
     * @param string $description
     * @param array $attributes
     * @param string $invalidFeedback Mensaje de validación (inválido)
     * 
     * @return self
     */
    public function addEmailField(string $name, string $label, string $description = '', array $attributes = [], string $invalidFeedback = ''): self
    {
        $this->addInputField('email', $name, $label, $description, $attributes, $invalidFeedback);
        return $this;
    }

    /**
     * Agrega un campo de mes
     * @param string $name
     * @param string $label
     * @param string $description
     * @param array $attributes
     * @param string $invalidFeedback Mensaje de validación (inválido)
     * 
     * @return self
     */
    public function addMonthField(string $name, string $label, string $description = '', array $attributes = [], string $invalidFeedback = ''): self
    {
        $this->addInputField('month', $name, $label, $description, $attributes, $invalidFeedback);
        return $this;
    }

    /**
     * Agrega un campo de número de correo electrónico
     * @param string $name
     * @param string $label
     * @param string $description
     * @param array $attributes
     * @param string $invalidFeedback Mensaje de validación (inválido)
     * 
     * @return self
     */
    public function addNumberField(string $name, string $label, string $description = '', array $attributes = [], string $invalidFeedback = ''): self
    {
        $this->addInputField('number', $name, $label, $description, $attributes, $invalidFeedback);
        return $this;
    }

    /**
     * Agrega un campo de número telefónico
     * @param string $name
     * @param string $label
     * @param string $description
     * @param array $attributes
     * @param string $invalidFeedback Mensaje de validación (inválido)
     * 
     * @return self
     */
    public function addPhoneField(string $name, string $label, string $description = '', array $attributes = [], string $invalidFeedback = ''): self
    {
        $this->addInputField('tel', $name, $label, $description, $attributes, $invalidFeedback);
        return $this;
    }

    /**
     * Agrega un campo de tiempo
     * @param string $name
     * @param string $label
     * @param string $description
     * @param array $attributes
     * @param string $invalidFeedback Mensaje de validación (inválido)
     * 
     * @return self
     */
    public function addTimeField(string $name, string $label, string $description = '', array $attributes = [], string $invalidFeedback = ''): self
    {
        $this->addInputField('time', $name, $label, $description, $attributes, $invalidFeedback);
        return $this;
    }

    /**
     * Agrega un campo de URL
     * @param string $name
     * @param string $label
     * @param string $description
     * @param array $attributes
     * @param string $invalidFeedback Mensaje de validación (inválido)
     * 
     * @return self
     */
    public function addUrlField(string $name, string $label, string $description = '', array $attributes = [], string $invalidFeedback = ''): self
    {
        $this->addInputField('url', $name, $label, $description, $attributes, $invalidFeedback);
        return $this;
    }

    /**
     * Agrega un campo de semana
     * @param string $name
     * @param string $label
     * @param string $description
     * @param array $attributes
     * @param string $invalidFeedback Mensaje de validación (inválido)
     * 
     * @return self
     */
    public function addWeekField(string $name, string $label, string $description = '', array $attributes = [], string $invalidFeedback = ''): self
    {
        $this->addInputField('week', $name, $label, $description, $attributes, $invalidFeedback);
        return $this;
    }

    /**
     * Agrega un campo de lista de selección <select>
     * @param string $name
     * @param string $label
     * @param array $options Array asociativo
     * @param bool $required
     * @param string $selectionMessage Ej. Seleccione una opción
     * @param string $description
     * @param string $invalidFeedback
     * 
     * @return self
     */
    public function addSelectField(string $name, string $label, array $options, bool $required = false, string $selectionMessage = 'Seleccione una opción', string $description = '', string $invalidFeedback = ''): self
    {
        $id = $name;
        $isRequired = $required ? 'required' : '';
        $describedBy = !empty($description) ? " aria-describedby=\"$id-help\"" : '';
        $smallTag = !empty($description) ? "<small id=\"$id-help\" class=\"$this->smallTagCssClass\">$description</small>" : "";
        $invalid = "<div id=\"$id-invalid-feedback\" class=\"$this->invalidFeedbackCssClass\">$invalidFeedback</div>";
        $inputHtml = "<label for=\"$id\">$label</label>";
        $inputHtml .= "<select name=\"$name\" class=\"{$this->selectInputCssClass}\" id=\"$id\" $describedBy $isRequired >";
        $inputHtml .= "<option selected disabled value=\"\">$selectionMessage</option>";
        foreach ($options as $key => $val) {
            if(gettype($key) == 'string') {
                $selected = '';
                if (isset($this->values[$name])) {
                    if ($this->values[$name] == $key) {
                        $selected = 'selected';
                    }
                }
                $inputHtml .= "<option value=\"$key\" $selected>$val</option>";
            }
        }
        $inputHtml .= "</select>";
        $inputHtml .= $invalid . $smallTag;
        $this->html .= $inputHtml;
        return $this;
    }

    /**
     * Agrega una etiqueta <label>
     * * No incluye atributo for
     * @param string $label
     * 
     * @return self
     */
    public function addLabel(string $label): self
    {
        $inputHtml = "<label>$label</label>";
        $this->html .= $inputHtml;
        return $this;
    }

    /**
     * Agrega el botón de envío
     * @param string $text
     * 
     * @return self
     */
    public function addSubmit(string $text = 'Enviar'): self
    {
        $id = !empty($this->formId) ? "id=\"{$this->formId}-submit\"" : '';
        $htmlButton = "<button $id class=\"{$this->submitButtonCssClass}\">$text</button>";
        $this->html .= $htmlButton;
        return $this;
    }

}
