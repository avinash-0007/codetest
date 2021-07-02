<div class="row">
    <div class="col-lg-12">           
        <h2>Agenda CRUD           
            <div class="pull-right">
			<a class="btn btn-primary" href="<?php echo base_url('agenda');?>"> List Agenda</a>
               <a class="btn btn-primary" href="<?php echo base_url('agenda/create');?>"> Create New Agenda</a>
			   <a class="btn btn-primary" href="<?php echo base_url('agenda/import');?>">Import Agenda</a>
			   <a class="btn btn-primary" href="<?php echo base_url('agenda/export');?>">Export Agenda</a>
            </div>
        </h2>
     </div>
</div>
<h1 style="text-align:center;">Add/Edit Agenda- ERRORS</h1>

    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="color:red;">
		<?php echo validation_errors(); ?>
            <div class="form-group">
            
        </div>
       
    </div>
    
