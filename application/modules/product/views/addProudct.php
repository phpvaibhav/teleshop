 <!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6 col-md-offset-3">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add Product</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" id="productFrom" action="<?php echo base_url().'product/add_Product'; ?>" autocomplete="off" enctype="multipart/form-data">
          <div class="box-body">
                 

            <div class="form-group">
              <label for="name">Name <span class="text-red">*</span></label>
              <input type="text" name="name" class="form-control" id="name" placeholder="" value="">
             
            </div>
           
            <div class="form-group">
              <label for="code">Code <span class="text-red">*</span></label>
             <input class="form-control " name="code" type="text" placeholder="" id="code"  value="" >   
             
            </div>
          
        	<div class="form-group">
              <label for="price">Price <span class="text-red">*</span></label>
             <input class="form-control " name="price" type="text" placeholder="" id="price"  value="" >    
            </div>
          
          <div class="form-group">
              <label for="Description">Description<span class="text-red">*</span></label>
             <textarea class="form-control " name="description"  placeholder="" id="Description"></textarea>   
            </div>
          
          
       
          
         	<div class="form-group">
                <label for="productImage">Image</label>
                <input class="form-control" type="text" placeholder="Browse..." readonly="">
                <input type="file" accept="image/*" onchange="document.getElementById('pImg').src = window.URL.createObjectURL(this.files[0])" name="image" id="productImage">  
            </div> 
       

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary btn-raised">Save</button>
             <a href="<?php echo base_url('product'); ?>" class="btn btn-primary btn-raised">Cancel</a>
          </div>
        </form>
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (left) -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->