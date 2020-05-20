<?php include('header.php') ?>                
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><?= $title?></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
                            <li class="breadcrumb-item active"><?= $title?></li>
                        </ol>
                    </div>   
                    <div class="col-md-7 align-self-center text-right d-none d-md-block">
                        <a href="<?= base_url()?>question"><button type="button" class="btn btn-info"><i class="fa fa-file-text-o"></i> List Questions</button></a>
                    </div>                 
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                                <?php if(!empty($error)){ ?>
                                         <div class="alert alert-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">x</span> </button>
                                            <h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Error</h3>
                                                    <?= $error;?>                                                   
                                        </div>
                                <?php } if(!empty($success)){ ?>
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">x</span> </button>
                                            <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3>
                                                    <?= $success;?>                                                 
                                        </div>
                                <?php } ?>
                 <div class="row">                    
                    <div class="col-md-6">
                        <div class="card card-body">
                            <h3 class="box-title m-b-0">Title Question of Questionnaire</h3>
                            <p class="text-muted m-b-30 font-13"> this form that use to insert title of questionnaire</p>
                            <form class="form-horizontal form-material" method="post" id="TitleForm" onsubmit="return false;" action="<?= base_url()?>question/edit_j/<?= $qtitle->_id ?>">
                                    <div class="alert alert-success" id="Notif">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">x</span> </button>
                                    <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3>
                                    Data has been changed
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Title of Questionnaire </label>
                                    <div class="col-md-12">
                                        <input type="text" value="<?= $qtitle->Title;?>" placeholder="" name="title" class="form-control form-control-line" required="">
                                    </div>
                                </div>
                                <input type="hidden" value="1" placeholder="" name="type" class="form-control form-control-line">
                                <input type="hidden" name="save" value="save" placeholder="" class="form-control form-control-line">
                                <div class="form-group m-b-0">
                                    <div class="offset-sm-3 col-sm-9">
                                        <button type="submit"  id="AddTitle" class="btn btn-info waves-effect waves-light m-t-10">Update Questions</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6" id="AddItemDiv">
                        <div class="card card-body">
                            <h3 class="box-title m-b-0">Add Question Item of Questionnaire</h3>
                            <p class="text-muted m-b-30 font-13"> this form that use to add question item  of questionnaire</p>                            
                            <form class="form-horizontal form-material" method="post" id="ItemForm" onsubmit="return false;" action="<?= base_url()?>question/add_j">
                                <div class="form-group">
                                    <label class="col-md-12">Qestions Item</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" rows="2" required=""  name="title"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Field *(no space, no capital alphabet)</label>
                                    <div class="col-md-12">
                                        <input type="text" value="" placeholder="" required="" name="field" class="form-control form-control-line">
                                    </div>
                                </div>
                                
                                <input type="hidden" value="2" placeholder="" name="type" class="form-control 
                                form-control-line">
                                <input type="hidden" value="<?= $qtitle->_id?>" placeholder="" name="id" id="Parent" class="form-control form-control-line">
                                <input type="hidden" name="save" value="save" placeholder="" class="form-control form-control-line">
                                <div class="form-group m-b-0">
                                    <div class="offset-sm-3 col-sm-9">
                                        <button type="submit"  name="save" value="save" id="AddItem" class="btn btn-info waves-effect waves-light m-t-10">Add Item Questions</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12" id="ListDiv">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Question List</h4>                                
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Question Item</th>
                                                <th>Field</th>
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ItemList">
                                            <?php $no = 1; foreach ($data as $s) { ?>
                                            <tr>                                                
                                                <td><?= $no++;?></td>
                                                                                            
                                                <td><?= $s->Title?></td>                        
                                                <td><?= $s->field?></td> 
                                                <td class="text-nowrap">                            
                                                    <a onclick="DeleteItem(<?= $s->_id ?>,<?= $s->id_parent ?>)" href="#" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                                                </td>
                                            </tr>
                                            <?php } ?>                                              
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
<?php include('footer.php') ?>     (
<script type="text/javascript">
    $("#TitleForm").submit(function(){       
        var form = $(this);
        var url = form.attr('action');

        $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               if(data != 'failed'){                    
                    $("#Notif").fadeIn(1000);
                    setTimeout(function(){ 
                        $("#Notif").fadeOut(1000);
                    }, 5000);
               } else {
                    alert('Faield, Try again');
               }
           }
        });
        e.preventDefault(); // avoid to execute the actual submit of the form.

    });
    $("#ItemForm").submit(function(){       
        var form = $(this);
        var url = form.attr('action');

        $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               if(data != 'failed'){
                    $('#ItemForm').trigger("reset");
                    $("#ListDiv").fadeIn(1000);
                    $("#ItemList").fadeOut(1000);
                    setTimeout(function(){ 
                        $("#ItemList").html(data);
                    }, 1000);
                    $("#ItemList").fadeIn(1000);
               } else {
                    alert('Faield, Try again');
               }
           }
        });
        e.preventDefault(); // avoid to execute the actual submit of the form.
    });

    function DeleteItem(id,idp){
        if(confirm("Delete this item?")){
            $.ajax({
               type: "POST",
               url: "<?= base_url()?>question/del_j/"+id+"/"+idp,
               data: {}, // serializes the form's elements.
               success: function(data)
               {
                   if(data != 'failed'){
                        $("#ListDiv").fadeIn(100);
                        $("#ItemList").fadeOut(1000);
                        setTimeout(function(){ 
                            $("#ItemList").html(data);
                        }, 1000);
                        $("#ItemList").fadeIn(1000);
                   } else {
                        alert('Faield, Try again');
                   }
               }
            });        
        }
        
    }
        
    $( document ).ready(function() {        
        $('#Notif').fadeOut(0);
    });
</script>>                           
 <!-- /.row -->
               