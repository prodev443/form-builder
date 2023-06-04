<?php
require_once __DIR__ . '/FormBuilder.php';
require_once __DIR__ . '/countries.php';

$builder = new FormBuilder();

// Valores por defecto
$values = [
    'id_field' => '666',
    'name' => 'Samuel',
    'last_name' => 'Alderete',
    'phone' => '',
    'checkbox1' => 1,
    'email' => 'sammymalware@gmail.com',
    'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente inventore expedita est accusamus ea error dolorem omnis porro cumque a eveniet amet, eos nostrum quaerat architecto repellendus tempore! Aperiam, asperiores.',
    'animal' => 'tiger',
    'country' => 'MX',
    'cv' => 'http://www.localhost.com'
];

$htmlForm = $builder->setValues($values)
    ->addInputHiddenField('id_field')
    ->addDiv(function() use($builder){
        $builder->addDiv(function() use($builder){
            $builder->addTextField('name', 'Nombre', 'Nombre personal', ['required', 'readonly'], 'El nombre es requerido');
        }, 'col-md-6 col-sm-12')
            ->addDiv(function() use($builder){
                $builder->addTextField('last_name', 'Apellidos', 'Apellidos');
            }, 'col-md-6 col-sm-12');
    }, 'row')
    ->addDiv(function() use($builder){
        $builder->addDiv(function() use($builder){
            $builder->addPhoneField('phone', 'Teléfono', 'Teléfono Fijo', ['pattern' => '[789][0-9]{9}']);
        }, 'col-md-6 col-sm-12')
            ->addDiv(function() use($builder){
                $builder->addTimeField('time', 'Tiempo', 'Tiempo');
            }, 'col-md-6 col-sm-12');
    }, 'row')
    ->addDiv(function() use($builder){
        $builder->addDiv(function() use($builder){
            $builder->addNumberField('number_field', 'Número', 'Campo de número', ['required']);
        }, 'col-md-6 col-sm-12')
            ->addDiv(function() use($builder){
                $builder->addEmailField('email', 'Correo', 'Dirección de correo electrónico', ['required'], 'Se necesita la dirección de correo electrónico');
            }, 'col-md-6 col-sm-12');
    }, 'row')
    ->addDiv(function() use($builder){
        $builder->addDiv(function() use($builder){
            $builder->addLabel('Casillas')
                ->addCheckboxField('checkbox1', 'Casilla 1')
                ->addCheckboxField('checkbox2', 'Casilla 2');
        }, 'col-md-6 col-sm-12')
            ->addDiv(function() use($builder){
                $builder->addLabel('Animales')
                    ->addRadioField('animal', 'León', 'lion', '1', ['required'],)
                    ->addRadioField('animal', 'Tigre', 'tiger', '2');
            }, 'col-md-6 col-sm-12');
    }, 'row')
    ->addDiv(function() use($builder){
        $builder->addDiv(function() use($builder){
            $builder->addDateField('date', 'Fecha', 'Fecha de nacimiento');
        }, 'col-md-6 col-sm-12')
            ->addDiv(function() use($builder){
                $builder->addTextField('street2', 'Calle 2');
            }, 'col-md-6 col-sm-12');
    }, 'row')
    ->addSelectField('country', 'País', $countries, true)
    ->addFileField('cv', 'Currículum Vitae', 'Currículum Vitae el formato PDF', ['required'])
    ->addTextAreaField('excerpt', 'Fragmento', 'Fragmento de texto')
    ->addSubmit()->get();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link type="image/png" sizes="16x16" rel="icon" href="assets/icons8-form-dotted-16.png">
    <link type="image/png" sizes="32x32" rel="icon" href="assets/icons8-form-dotted-32.png">
    <link type="image/png" sizes="96x96" rel="icon" href="assets/icons8-form-dotted-96.png">
    <title>Bootstrap 4 Form Builder</title>
</head>

<body>
    <div class="container mt-3 mb-3">
        <h3>FormBuilder By sammymalware</h3>
        <div class="mt-4"><?= $htmlForm ?></div>
    </div>
</body>

</html>