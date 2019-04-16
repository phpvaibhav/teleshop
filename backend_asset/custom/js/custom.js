var base_url = $('#admin_base_url').attr('data-base-url');

function show_loader(){
    $('#tl_admin_loader').show();
}

function hide_loader(){
    $('#tl_admin_loader').hide();
}

$(document).ready(function(){
  hide_loader();
});
$('form[id="profile_Form"]').validate({
  rules: {
    fullName: 'required',
    
    email: {
      required: true,
      email: true,
    },
   /* psword: {
      required: true,
      minlength: 8,
    }*/
  },
  messages: {
    fullName: 'Full name is required',
    email: 'Enter a valid email',
   /* psword: {
      minlength: 'Password must be at least 8 characters long'
    }*/
  },
  submitHandler: function(form) {
    
  //grab all form data  
  var formData = new FormData($(form)[0]);
        $.ajax({
            url: form.action,
            type: form.method,
            data: formData,
             async: false,
    cache: false,
    contentType: false,
    processData: false,
            dataType:'json',
            beforeSend: function() {
              show_loader();
           },
            success: function(response) {
               hide_loader();
               if(response.status==1){
                toastr.error(response.message);
               }else{
                 toastr.success(response.message);
               }
               location.reload(true);
            }            
        });
    }
});
$('form[id="password_Form"]').validate({
  rules: {
    password: {
      required: true,
      minlength: 6,
    },
    cpassword: {
      required: true,
      minlength: 6,
      equalTo: "#Password"
    }
  },
  messages: {
    password: 'Password is required',
    cpassword: 'Confrom password is required',
  
  },
  submitHandler: function(form) {
        $.ajax({
            url: form.action,
            type: form.method,
            data: $(form).serialize(),
            dataType:'json',
            beforeSend: function() {
              show_loader();
           },
            success: function(response) {
               hide_loader();
               if(response.status==1){
                toastr.error(response.message);
               }else{
                 toastr.success(response.message);
               }
               location.reload(true);
            }            
        });
    }
});