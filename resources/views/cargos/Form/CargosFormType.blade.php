<div class="box-body">
    <div class="form-group">
        <label for="name" class="col-sm-4 control-label">Nombre del cargo</label>

        <div class="col-sm-4">
            [[ Form::text('nombre', null, $attributes = array('id' => 'nombre', 'class' => 'form-control', 'placeholder' => 'Cargo', 'required' => 'required')) ]]
        </div>
    </div>
    <div class="form-group">
        <label for="username" class="col-sm-4 control-label">Salario mensual</label>

        <div class="col-sm-4">
            [[ Form::text('salario_mensual', null, $attributes = array('id' => 'salario_mensual', 'class' => 'form-control', 'placeholder' => 'Salario mensual', 'required' => 'required')) ]]
        </div>
    </div>
</div>
