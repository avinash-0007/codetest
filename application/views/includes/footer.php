</div>
<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
			<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
 <script src="<?php echo base_url();?>assets/dist/jquery.validate.js"></script>
 <script type="text/javascript">
            $(function () {
                $('#dtpickerdemo').datetimepicker({minDate:new Date()});
				
            });
			<?php if(@$agendaarr->schedule_date!=''){?>
			 $(function () {
                $('#dtpickerdemo2').datetimepicker({minDate:new Date(),defaultDate:<?php echo @$agendaarr->schedule_date; ?>});
				
            });
			<?php } ?>
			// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='agendaCreate']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      title: {required:true,maxlength:200},
      description: "required",
      schedule_date: {
        required: true,
        
      },
     
    },
    // Specify validation error messages
    messages: {
      title: "Please enter your title not more then 200 letters",
      description: "Please enter your description",     
      schedule_date: "Please enter a schedule date"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
  
    $("form[name='agendaEdit']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      title: {required:true,maxlength:200},
      description: "required",
      schedule_date: {
        required: true,
        
      },
	   status: {
        required: true,
        
      },
     
    },
    // Specify validation error messages
    messages: {
      title: "Please enter your title not more then 200 letters",
      description: "Please enter your description",     
      schedule_date: "Please enter a schedule date",
	  schedule_date: "Please enter a status"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});	
</script>
    
</body>
</html>