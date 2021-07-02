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
<h1 style="text-align:center;">Create Agenda</h1>
<form method="post" name="agendaCreate" action="<?php echo base_url('agendaCreate');?>">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
		<?php echo validation_errors(); ?>
            <div class="form-group">
                <label class="col-md-3">Title</label>
                <div class="col-md-9">
                    <input type="text" name="title" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Description</label>
                <div class="col-md-9">
                    <textarea name="description" class="form-control"></textarea>
                </div>
            </div>
        </div>
		<div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <label class="col-md-3">Schedule Date</label>
                <div class="col-md-9">
                   <input type='text' name="schedule_date" class="form-control" id='dtpickerdemo' />
                </div>
            </div>
        </div>
		
		
	
	
		
        <div class="col-md-8 col-md-offset-2 pull-right">
            <input type="submit" name="Save" class="btn">
        </div>
    </div>
    
</form>