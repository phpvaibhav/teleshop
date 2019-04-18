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

    var users_list = $('#users_list').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' servermside processing mode.
        "order": [], //Initial no order.
         "lengthChange": false,
        "oLanguage": {
         "sEmptyTable" : '<center>No users found</center>',
        },
         "oLanguage": {
         "sZeroRecords" : '<center>No users found</center>',
        },
       
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": base_url+"users/getUsersList",
            "type": "POST",
            "dataType": "json",
            "dataSrc": function (jsonData) {
               
                return jsonData.data;
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [
            { orderable: false, targets: -1 },
            
        ]

    });
  var product_list = $('#product_list').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' servermside processing mode.
        "order": [], //Initial no order.
         "lengthChange": false,
        "oLanguage": {
         "sEmptyTable" : '<center>No product found</center>',
        },
         "oLanguage": {
         "sZeroRecords" : '<center>No product found</center>',
        },
       
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": base_url+"product/getProductList",
            "type": "POST",
            "dataType": "json",
            "dataSrc": function (jsonData) {
               
                return jsonData.data;
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [
            { orderable: false, targets: -1 },
            
        ]

    });

    $('form[id="userFrom"]').validate({
  rules: {
    fullName: 'required',
    userName: 'required',
    userType: 'required',
    
    email: {
      required: true,
      email: true,
    },
    password: {
      required: true,
      minlength: 6,
    }
  },
  messages: {
    fullName: 'Full name is required',
    email: 'Enter a valid email',
    userName: 'User name is required',
    userType: 'User role is required',
    password: {
      minlength: 'Password must be at least 6 characters long'
    }
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
                toastr.success(response.message);
                
                setTimeout(function(){ window.location.href = base_url+'users';  }, 3000);
               }else{
                 toastr.error(response.message);
               }

                //
            }            
        });
    }
});  
$('form[id="productFrom"]').validate({
  rules: {
    name: 'required',
    code: 'required',
    price: 'required',
    
  },
  messages: {
    name: 'Name is required',
    code: 'Code is required',
    price: 'Price is required',
   
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
                toastr.success(response.message);
                
                setTimeout(function(){ window.location.href = base_url+'product';  }, 3000);
               }else{
                 toastr.error(response.message);
               }

                //
            }            
        });
    }
});