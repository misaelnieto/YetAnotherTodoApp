<?php if ($this->session->flashdata('message') != ''): ?>
<div class="row">
    <div class="large-6 columns">
        <div class="alert-box info radious">
            <?php echo $this->session->flashdata('message'); ?>
            <a href="#" class="close">&times;</a>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- main content starts here -->
<div class="row">
    <div class="large-12 columns">
        <div class="panel">
            <?php echo form_open('profile/edit'); ?>
                <?php echo validation_errors(); ?>
                <div class="row collapse">
                    <div class="small-2  columns">
                        <span class="prefix"><i class="foundicon-people"></i></span>
                    </div>
                    <div class="small-10  columns">
                        <?php echo form_input(['name' => 'full_name', 'value' => $user->full_name, 'placeholder'=> 'Nombre completo', 'required'=>'']); ?>
                    </div>
                </div>
                <div class="row collapse">
                    <div class="small-2 columns">
                        <span class="prefix"><i class="foundicon-mail"></i></span>
                    </div>
                    <div class="small-10  columns">
                        <?php echo form_input(['name' => 'email', 'type' => 'email', 'value' => $user->email, 'placeholder'=> 'Correo Electrónico', 'required'=>'']); ?>
                    </div>
                </div>
                <div class="row collapse">
                    <div class="small-2 columns ">
                        <span class="prefix"><i class="foundicon-lock"></i></span>
                    </div>
                    <div class="small-10 columns ">
                        <input type="password" name="password" placeholder="Contraseña">
                    </div>
                </div>
                <input type="submit" class="button" name="do_edit" value="Guardar cambios"/>
            </form>
        </div>
    </div>
</div>
<!-- main content ends here -->
