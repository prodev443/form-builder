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
    /**
     * Id (html) del formulario
     * @var string
     */
    protected string $formId = '';

    /**
     * * Formulario HTML Generado
     * @var string
     */
    protected string $html = '';

    /**
     * * Valores por defecto del formulario
     * @var array
     */
    protected array $values = [];

    /**
     * * Clase CSS para las etiquetas <input>
     * * Aplica para los tipos: date, datetime-local, email, month, number, password, tel, text, time, url, week
     * @var string
     */
    protected string $inputCssClass = 'form-control';

    /**
     * * Clase CSS para la descripción del campo
     * @var string
     */
    protected string $smallTagCssClass = 'form-text text-muted mb-2';

    /**
     * * Clase CSS para la capa de feedback inválido
     * @var string
     */
    protected string $invalidFeedbackCssClass = 'invalid-feedback';

    /**
     * * Clase CSS para la casilla de verificación
     * @var string
     */
    protected string $checkboxInputCssClass = 'custom-control-input';

    /**
     * * Clase CSS para la etiqueta <label> de la casilla de verificación
     * @var string
     */
    protected string $checkboxLabelCssClass = 'custom-control-label';

    /**
     * * Clase CSS para el contenedor <div> de la casilla de verificación
     * @var string
     */
    protected string $checkboxContainerCssClass = 'custom-control custom-checkbox custom-switch mb-2';

    /**
     * * Clase CSS para el <input> tipo radio
     * @var string
     */
    protected string $radioInputCssClass = 'custom-control-input';

    /**
     * * Clase CSS para la etiqueta <label> del <input> tipo radio
     * @var string
     */
    protected string $radioLabelCssClass = 'custom-control-label';

    /**
     * * Clase CSS para el contenedor <div> del <input> tipo radio
     * @var string
     */
    protected string $radioContainerCssClass = 'custom-control custom-radio mb-2';

    /**
     * * Clase CSS para la caja de selección
     * @var string
     */
    protected string $selectInputCssClass = 'custom-select mb-2';

    /**
     * * Clase CSS para el <input> tipo radio
     * @var string
     */
    protected string $fileInputCssClass = 'custom-file-input';

    /**
     * * Clase CSS para la etiqueta <label> del <input> tipo file
     * @var string
     */
    protected string $fileLabelCssClass = 'custom-file-label';

    /**
     * * Clase CSS para el contenedor <div> del <input> tipo file
     * @var string
     */
    protected string $fileContainerCssClass = 'custom-file';

    /**
     * * Botón HTML para actualizar archivo
     * * Debe iniciar estrictamente con <button
     * * No debe contener id del DOM
     * @var string
     */
    protected string $updateFileButton = '<button type="button" class="btn btn-info ml-2"><i class="bx bx-cloud-upload"></i></button>';
    
    /**
     * * Botón HTML para eliminar archivo
     * * Debe iniciar estrictamente con <button
     * * No debe contener id del DOM
     * @var string
     */
    protected string $deleteFileButton = '<button type="button" class="btn btn-danger ml-2"><i class="bx bx-trash" ></i></button>';

    /**
     * * Clase CSS para el contenedor de los botones del campo archivo
     * @var string
     */
    protected string $fileButtonsContainerCssClass = 'd-flex';

    /**
     * * Clase CSS para el botón de envío
     * @var string
     */
    protected string $submitButtonCssClass = 'btn btn-primary mt-3';

    /**
     * * Atributos HTML permitidos para la etiqueta <input>
     * @var array
     */
    protected array $allowedInputAttributes = [
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

    /**
     * @param string $id Id HTML
     * @param string $method GET|POST
     * @param string $action URL
     */
    public function __construct($id = '', $method = '', $action = '')
    {
        $id = !empty($id) ? "id=\"$id\"" : "";
        $method = !empty($method) ? "method=\"$method\"" : "";
        $action = !empty($action) ? "action=\"$action\"" : "";
        $openTag = "<form $id $method $action >";
        $this->formId = $id;
        $this->html .= $openTag;
    }

    // Inician Setters

    /**
     * Set the value of values
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
     * @param string $inputCssClass

     * @return self
     */
    public function setInputCssClass(string $inputCssClass): self
    {
        $this->inputCssClass = $inputCssClass;

        return $this;
    }

    /**
     * Set the value of smallTagCssClass
     * @param string $smallTagCssClass
     * 
     * @return self
     */
    public function setSmallTagCssClass(string $smallTagCssClass): self
    {
        $this->smallTagCssClass = $smallTagCssClass;

        return $this;
    }

    /**
     * Set the value of submitButtonCssClass
     * @param string $submitButtonCssClass
     * 
     * @return self
     */
    public function setSubmitButtonCssClass(string $submitButtonCssClass): self
    {
        $this->submitButtonCssClass = $submitButtonCssClass;

        return $this;
    }

    /**
     * Set the value of selectInputCssClass
     * @param string $selectInputCssClass
     * 
     * @return self
     */
    public function setSelectInputCssClass(string $selectInputCssClass): self
    {
        $this->selectInputCssClass = $selectInputCssClass;

        return $this;
    }

    /**
     * Set the value of invalidFeedbackCssClass
     * @param string $invalidFeedbackCssClass
     * 
     * @return self
     */
    public function setInvalidFeedbackCssClass(string $invalidFeedbackCssClass): self
    {
        $this->invalidFeedbackCssClass = $invalidFeedbackCssClass;

        return $this;
    }

    /**
     * Set the value of checkboxInputCssClass
     * @param string $checkboxInputCssClass
     * 
     * @return self
     */
    public function setCheckboxInputCssClass(string $checkboxInputCssClass): self
    {
        $this->checkboxInputCssClass = $checkboxInputCssClass;

        return $this;
    }

    /**
     * Set the value of checkboxLabelCssClass
     * @param string $checkboxLabelCssClass
     * 
     * @return self
     */
    public function setCheckboxLabelCssClass(string $checkboxLabelCssClass): self
    {
        $this->checkboxLabelCssClass = $checkboxLabelCssClass;

        return $this;
    }

    /**
     * Set the value of checkboxContainerCssClass
     * @param string $checkboxContainerCssClass
     * 
     * @return self
     */
    public function setCheckboxContainerCssClass(string $checkboxContainerCssClass): self
    {
        $this->checkboxContainerCssClass = $checkboxContainerCssClass;

        return $this;
    }

    /**
     * Set the value of radioInputCssClass
     * @param string $radioInputCssClass
     * 
     * @return self
     */
    public function setRadioInputCssClass(string $radioInputCssClass): self
    {
        $this->radioInputCssClass = $radioInputCssClass;

        return $this;
    }

    /**
     * Set the value of radioLabelCssClass
     * @param string $radioLabelCssClass
     * 
     * @return self
     */
    public function setRadioLabelCssClass(string $radioLabelCssClass): self
    {
        $this->radioLabelCssClass = $radioLabelCssClass;

        return $this;
    }

    /**
     * Set the value of radioContainerCssClass
     * @param string $radioContainerCssClass
     * 
     * @return self
     */
    public function setRadioContainerCssClass(string $radioContainerCssClass): self
    {
        $this->radioContainerCssClass = $radioContainerCssClass;

        return $this;
    }

    /**
     * Set the value of fileInputCssClass
     * @param string $fileInputCssClass
     * 
     * @return self
     */
    public function setFileInputCssClass(string $fileInputCssClass): self
    {
        $this->fileInputCssClass = $fileInputCssClass;

        return $this;
    }

    /**
     * Set the value of fileLabelCssClass
     * @param string $fileLabelCssClass
     * 
     * @return self
     */
    public function setFileLabelCssClass(string $fileLabelCssClass): self
    {
        $this->fileLabelCssClass = $fileLabelCssClass;

        return $this;
    }

    /**
     * Set the value of fileContainerCssClass
     * @param string $fileContainerCssClass
     * 
     * @return self
     */
    public function setFileContainerCssClass(string $fileContainerCssClass): self
    {
        $this->fileContainerCssClass = $fileContainerCssClass;

        return $this;
    }
    
    /**
     * Set the value of updateFileButton
     * @param string $updateFileButton
     * 
     * @return self
     */
    public function setUpdateFileButton(string $updateFileButton): self
    {
        $this->updateFileButton = $updateFileButton;

        return $this;
    }

    /**
     * Set the value of deleteFileButton
     * @param string $deleteFileButton
     * 
     * @return self
     */
    public function setDeleteFileButton(string $deleteFileButton): self
    {
        $this->deleteFileButton = $deleteFileButton;

        return $this;
    }

    /**
     * Set the value of fileButtonsContainerCssClass
     * @param string $fileButtonsContainerCssClass
     * 
     * @return self
     */
    public function setFileButtonsContainerCssClass(string $fileButtonsContainerCssClass): self
    {
        $this->fileButtonsContainerCssClass = $fileButtonsContainerCssClass;

        return $this;
    }

    // Terminan Setters
    
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
     * Genera una sección con botones de eliminación y actualización para el campo de archivo
     * @param mixed $id
     * @param mixed $name
     * @param mixed $attributes
     * 
     * @return string
     */
    protected function getFileUploadSection($id, $name, $attributes): string
    {
        $value = $this->getInputValue($name);
        $section = '';
        if (!empty($value)) {
            $section .= "<div class=\"{$this->fileButtonsContainerCssClass}\">";
            $updateBtn = str_replace('<button', "<button id=\"$id-update-btn\"", $this->updateFileButton);
            $section .= $updateBtn;
            if (!in_array('required', $attributes)) {
                $deleteBtn = str_replace('<button', "<button id=\"$id-delete-btn\"", $this->deleteFileButton);
                $section .= $deleteBtn;
            }
            $section .= "</div>";
        }
        return $section;
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
        $selectedSelectionMessage = true;
        foreach ($options as $key => $val) {
            if(gettype($key) == 'string') {
                $selected = '';
                if (isset($this->values[$name])) {
                    if ($this->values[$name] == $key) {
                        $selected = 'selected';
                        $selectedSelectionMessage = false;
                    }
                }
                $inputHtml .= "<option value=\"$key\" $selected>$val</option>";
            }
        }
        $selected = $selectedSelectionMessage ? 'selected' : '';
        $inputHtml .= "<option $selected disabled value=\"\">$selectionMessage</option>";
        $inputHtml .= "</select>";
        $inputHtml .= $invalid . $smallTag;
        $this->html .= $inputHtml;
        return $this;
    }

    public function addFileField(string $name, string $label, string $description = '', array $attributes = [], string $invalidFeedback = '')
    {
        $id = $name;
        $describedBy = !empty($description) ? " aria-describedby=\"$id-help\"" : '';
        $smallTag = !empty($description) ? "<small id=\"$id-help\" class=\"$this->smallTagCssClass\">$description</small>" : "";
        $attributesString = $this->processInputAttributes($attributes);
        $invalid = "<div id=\"$id-invalid-feedback\" class=\"$this->invalidFeedbackCssClass\">$invalidFeedback</div>";
        $inputHtml = "<div class=\"d-flex flex-row\">";
        $inputHtml .= "<div class=\"{$this->fileContainerCssClass}\">";
        $inputHtml .= "<label for=\"$id\" class=\"{$this->fileLabelCssClass}\">$label</label>";
        $inputHtml .= "<input name=\"$name\" type=\"file\" class=\"{$this->fileInputCssClass}\" id=\"$id\" $describedBy $attributesString>";
        $inputHtml .= "</div>";
        $inputHtml .= $this->getFileUploadSection($id, $name, $attributes);
        $inputHtml .= "</div>";
        $inputHtml .= "<div>"; // Invalid feedback and description div
        $inputHtml .= $invalid . $smallTag;
        $inputHtml .= "</div>";
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
