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
        <label for="email" class="col-sm-4 control-label">Email</label>

        <div class="col-sm-4">
            [[ Form::email('email', null, array('id' => 'email', 'placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required')) ]]
        </div>
    </div>
    <div class="form-group">
        <label for="username" class="col-sm-4 control-label">Usuario</label>

        <div class="col-sm-4">
            [[ Form::text('username', null, $attributes = array('id' => 'username', 'class' => 'form-control', 'placeholder' => 'Nombre de usuario', 'required' => 'required')) ]]
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-4 control-label">Contraseña</label>
        <div class="col-sm-4">
            [[ Form::password('password', array('class' => 'form-control', 'id' => 'password', 'placeholder' => 'Contraseña', 'required' => 'required')) ]]
        </div>
    </div>
    <div class="form-group">
        <label for="password_confirmation" class="col-sm-4 control-label">Repita contraseña</label>

        <div class="col-sm-4">
            [[ Form::password('password_confirmation', array('class' => 'form-control', 'id' => 'password_confirmation', 'placeholder' => 'Repita contraseña', 'required' => 'required')) ]]
        </div>
    </div>
    <div class="form-group">
        <label for="rol" class="col-sm-4 control-label">Rol</label>

        <div class="col-sm-4">
            [[ Form::select('rol', array('' => 'Seleccione','1' => 'Administrador', '0' => 'Analista'), null, $attributes = array('id' => 'rol', 'class' => 'form-control', 'required' => 'required')) ]]
        </div>
    </div>
    <div class="form-group">
        <label for="detalles" class="col-sm-4 control-label">Información adicional</label>

        <div class="col-sm-4">
            [[ Form::textarea('details', null, $attributes = array('id' => 'details', 'class' => 'form-control', 'rows' => '3')) ]]
        </div>
    </div>
</div>
