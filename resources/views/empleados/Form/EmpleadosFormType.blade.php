<div class="box-body">
    <div class="form-group">
        <label for="file" class="col-sm-4 control-label">Imagen</label>

        <div class="col-sm-4">
            [[ Form::file('file', $attributes = array('class' => 'form-control', 'id' => 'file', 'accept' => 'image/jpg,image/png,image/jpeg,image/gif')) ]]
            <label id="file-error" class="error" for="file" style="display:none"></label>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-4 control-label">Nombre y apellido</label>

        <div class="col-sm-4">
            [[ Form::text('name', null, $attributes = array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'Nombre y apellido', 'required' => 'required')) ]]
        </div>
    </div>
    <div class="form-group">
        <label for="cedula" class="col-sm-4 control-label">Cédula</label>

        <div class="col-sm-4">
            [[ Form::text('cedula', null, $attributes = array('id' => 'cedula', 'placeholder' => 'Cédula', 'class' => 'form-control', 'required' => 'required')) ]]
        </div>
    </div>
    <div class="form-group">
        <label for="rif" class="col-sm-4 control-label">Rif</label>

        <div class="col-sm-4">
            [[ Form::text('rif', null, $attributes = array('id' => 'rif', 'class' => 'form-control', 'placeholder' => 'Rif', 'required' => 'required')) ]]
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-4 control-label">Email</label>

        <div class="col-sm-4">
            [[ Form::email('email', null, array('id' => 'email', 'placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required')) ]]
        </div>
    </div>
    <div class="form-group">
        <label for="usuarioSlack" class="col-sm-4 control-label">Usuario de slack</label>

        <div class="col-sm-4">
            [[ Form::text('usuarioSlack', null, $attributes = array('id' => 'usuarioSlack', 'class' => 'form-control', 'placeholder' => 'Nombre de usuario en slack', 'required' => 'required')) ]]
        </div>
    </div>
    <div class="form-group">
        <label for="fecha_ingreso" class="col-sm-4 control-label">Fecha de ingreso</label>
        <div class="col-sm-4">
            @if(isset($empleado->fecha_ingreso))
                {{--*/ $separarFecha =  explode('-', $empleado->fecha_ingreso) /*--}}
                {{--*/ $fechaNormal =  $separarFecha[2].'/'.$separarFecha[1].'/'.$separarFecha[0] /*--}}
                [[ Form::text('fecha_ingreso', $fechaNormal, array('class' => 'form-control datepicker', 'id' => 'fecha_ingreso', 'placeholder' => 'Fecha de ingreso', 'required' => 'required')) ]]
            @else
                [[ Form::text('fecha_ingreso', null, array('class' => 'form-control datepicker', 'id' => 'fecha_ingreso', 'placeholder' => 'Fecha de ingreso', 'required' => 'required')) ]]
            @endif
        </div>
    </div>
    <div class="form-group">
        <label for="cargo" class="col-sm-4 control-label">Cargo</label>

        <div class="col-sm-4">
            [[ Form::select('cargo', $cargos, null, $attributes = array('id' => 'cargo', 'class' => 'form-control', 'required' => 'required')) ]]
        </div>
    </div>
</div>
