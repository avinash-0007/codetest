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

<h1 style="text-align:center;">Import Agenda</h1>

    <div class="row">
        <div class="col-md-8 col-md-offset-2" >
<form enctype="multipart/form-data" method="post" role="form">
<div class="form-group">
<label for="exampleInputFile">File Upload</label>
<input type="file" name="file" id="file" size="150">
<p >Only CSV File Import.</p>
</div>
<button type="submit" class="btn btn-default" name="submit" value="submit">Upload</button>
</div></div>