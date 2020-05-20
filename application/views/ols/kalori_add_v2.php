<?php include('header.php'); ?>

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor"><?= $title?></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url();?>schedule">Athelete Food</a></li>
                            <li class="breadcrumb-item active"><?= $title?></li>
                        </ol>
                    </div>                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <form id="food_insert" class="form-material m-t-40" method="post" action="">
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Form Add Athelete Food</h4>
                                <h6 class="card-subtitle">This form are used for Athlete to add food consumption</h6>                       
                                    <?php if(!empty($error)) {?>
                                        <div class="alert alert-warning">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">x</span> </button>
                                                <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Warning</h3>
                                                <?= $error;?>
                                                <span class="text-semibold">try submitting again</span><br/> 
                                        </div>
                                    <?php }if(!empty($success)) {?>
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">x</span> </button>
                                        <h3 class="text-success"><i class="fa fa-check-circle"></i>Success</h3>
                                        <?= $success;?>
                                    </div>
                                    <?php } ?> 
                                    <div class="form-group">
                                        <label class="col-md-12">Date :</label>
                                        <div class="col-md-12">                             
                                            <input type="date" class="form-control" name="date_food" value="" id="date1" required="">                            
                                        </div>
                                    </div> 
                                    <button type="button" id="btnItem" class="btn btn-info" alt="default" data-toggle="modal" data-target="#responsive-modal"><i class="fa fa-plus-circle"></i> Add Athlete Food</button>                              
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Breakfast</h4>
                                <h6 class="card-subtitle">Athlete food on breakfast</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="30%">Food</th>
                                                <th width="14%">Serving Size</th>
                                                <th width="14%">Calories</th>
                                                <th width="14%">Carbs</th>
                                                <th width="14%">Fat</th>
                                                <th width="14%">Protein</th>                                                
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ItemListBreakfast">
                                        <tr></tr>   
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Lunch</h4>
                                <h6 class="card-subtitle">Athlete food on lunch</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="30%">Food</th>
                                                <th width="14%">Serving Size</th>
                                                <th width="14%">Calories</th>
                                                <th width="14%">Carbs</th>
                                                <th width="14%">Fat</th>
                                                <th width="14%">Protein</th>                                                
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ItemListLunch">
                                        <tr></tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Dinner</h4>
                                <h6 class="card-subtitle">Athlete food on dinner</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="30%">Food</th>
                                                <th width="14%">Serving Size</th>
                                                <th width="14%">Calories</th>
                                                <th width="14%">Carbs</th>
                                                <th width="14%">Fat</th>
                                                <th width="14%">Protein</th>                                                
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ItemListDinner">
                                        <tr></tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Snacks</h4>
                                <h6 class="card-subtitle">Athlete food on snacks</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="30%">Food</th>
                                                <th width="14%">Serving Size</th>
                                                <th width="14%">Calories</th>
                                                <th width="14%">Carbs</th>
                                                <th width="14%">Fat</th>
                                                <th width="14%">Protein</th>                                                
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ItemListSnacks">
                                        <tr></tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr class="table-success">
                                                <th width="44%">&nbsp;</th>
                                                <th width="14%">Calories</th>
                                                <th width="14%">Carbs</th>
                                                <th width="14%">Fat</th>
                                                <th width="14%">Protein</th>  
                                            </tr>
                                        </thead>
                                        <tbody id="ItemListSnacks">
                                            <tr>
                                                <td><b>Total</b></td>
                                                <td id="cal_total1">0</td>
                                                <td id="carb_total1">0</td>
                                                <td id="fat_total1">0</td>
                                                <td id="prot_total1">0</td>
                                            </tr>
                                            <tr>
                                                <td><b>Your Daily Goal</b></td>
                                                <td>1,500</td>
                                                <td>188</td>
                                                <td>50</td>
                                                <td>75</td>
                                            </tr>
                                            <tr>
                                                <td><b>Remaing</b></td>
                                                <td id="cal_total2">1,500</td>
                                                <td id="carb_total2">188</td>
                                                <td id="fat_total2">50</td>
                                                <td id="prot_total2">75</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div id="dataku">
                            
                        </div>
                        <input type="hidden" name="id_athlete" value="<?= $user_now->_id;?>">
                        <input type="hidden" id="cal_total3" name="kalori" value="0">
                        <input type="hidden" id="carb_total3" name="karbohidrat" value="0">
                        <input type="hidden" id="fat_total3" name="lemak" value="0">
                        <input type="hidden" id="prot_total3" name="protein" value="0">

                        <button type="submit" name="save" value="save" class="btn btn-success"><i class="fa fa-plus-circle"></i> Submit</button>
                    </div>
                </div>
                </form>


<!-- Form -->
<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Food</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal form-material" method="post" id="ItemForm" onsubmit="return false;" action="">                
            <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Food :</label>
                        <select id="form_food" class="form-control form-control-line" name="id_makanan" required>
                            <option value="">Choose Food from list</option>
                            <?php foreach ($makanan as $d) { ?>
                                <option value="<?= $d->_id?>"><?= $d->food?> [Calories : <?= $d->kalori_total?> g]</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Serving Size :</label>
                        <input id="sajian" type="number" class="form-control form-control" placeholder="" name="sajian" min="1" max="5" required="">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Information :</label>
                        <select id="waktu" class="form-control form-control" name="waktumakan" required>
                            <option value="">As eat for</option>                            
                            <option value="Breakfast">Breakfast</option>
                            <option value="Lunch">Lunch</option>
                            <option value="Dinner">Dinner</option>
                            <option value="Snacks">Snacks</option>                            
                        </select>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" id="clsForm">Close</button>
                <button type="submit" class="btn btn-danger waves-effect waves-light">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
<script type="text/javascript">
    Number.prototype.format = function(n, x) {
        var re = '(\\d)(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
        return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$1,');
    };

    var food = new Array();
    var food_list = new Array();
    var last_id = 0;
    <?php
        foreach ($makanan as $d) { 
            echo "food[ $d->_id ] = {food: '$d->food',cal: $d->kalori_total , carbs: $d->karbohidrat , fat: $d->lemak , protein: $d->protein };";            
        }
    ?>    
    console.log(food); 
    $("#ItemForm").submit(function(){       
        var form = $(this);
        var id_food = $('#form_food').val();
        var sajian = $('#sajian').val();
        var waktu = $('#waktu').val();
        var cal = food[id_food].cal * sajian;
        var carbs = food[id_food].carbs * sajian;
        var fat = food[id_food].fat * sajian;
        var protein = food[id_food].protein * sajian;
        var hapus = '<i onclick="hapus('+last_id+')" class="fa fa-close text-danger btn-hapus"></i>';
        food_list[last_id++] = {cal:cal, cab: carbs, fat: fat, prot: protein};

        var dt_id = '<input type="hidden" value="'+id_food+'" name="foods['+(last_id-1)+'][food]" />';
        var dt_waktu = '<input type="hidden" value="'+waktu+'" name="foods['+(last_id-1)+'][waktu]" />';
        var dt_cal = '<input type="hidden" value="'+cal+'" name="foods['+(last_id-1)+'][cal]" />';
        var dt_cab = '<input type="hidden" value="'+carbs+'" name="foods['+(last_id-1)+'][carbs]" />';
        var dt_fat = '<input type="hidden" value="'+fat+'" name="foods['+(last_id-1)+'][fat]" />';
        var dt_prot = '<input type="hidden" value="'+protein+'" name="foods['+(last_id-1)+'][protein]" />';


        if(waktu == 'Breakfast'){
            waktu = 'ItemListBreakfast';
        } else if(waktu == 'Lunch'){
            waktu = 'ItemListLunch';
        } else if(waktu == 'Dinner'){
            waktu = 'ItemListDinner';
        } else if(waktu == 'Snacks'){
            waktu = 'ItemListSnacks';
        }


        $('#'+waktu+' tr:last').after('<tr id="foods-'+(last_id-1)+'"><td>'+food[id_food].food+'</td><td>'+sajian+'</td><td>'+cal.format(0)+'</td><td>'+carbs.format(0)+'</td><td>'+fat.format(0)+'</td><td>'+protein.format(0)+'</td><td class="text-nowrap">'+hapus+'</td></tr>');

        var ss = '<div id="data-'+(last_id-1)+'">'+dt_id+dt_waktu+dt_cal+dt_cab+dt_fat+dt_prot+'</div>"';
        $("#dataku").append(ss);
        $("#clsForm").click(); 
        $('#ItemForm').trigger("reset"); 
        hitung();              
        e.preventDefault(); // avoid to execute the actual submit of the form.
    });

    function hapus(id){
        $("#foods-"+id).fadeOut(500);
        $("#data-"+id).hide(0);
        food_list[id] = null;
        hitung();
    }

    function hitung(){
        var total_cal=0;
        var total_cab=0;
        var total_fat=0;
        var total_prot=0;
        for(i=0;i<last_id;i++){
            if ( food_list[i] != null){
                total_cal+=food_list[i].cal;       
                total_cab+=food_list[i].cab;       
                total_fat+=food_list[i].fat;       
                total_prot+=food_list[i].prot;       
            }
        }
        $('#cal_total1').html(total_cal.format(0));
        $('#carb_total1').html(total_cab.format(0));
        $('#fat_total1').html(total_fat.format(0));
        $('#prot_total1').html(total_prot.format(0));

        rem_cal = 1500 -  total_cal;
        rem_cab = 188 -  total_cab;
        rem_fat = 50 -  total_fat;
        rem_prot = 75 -  total_prot;
        
        if(rem_prot<0) rem_prot = 0;
        if(rem_cal<0) rem_cal = 0;
        if(rem_fat<0) rem_fat = 0;
        if(rem_cab<0) rem_cab = 0;

        $('#cal_total2').html(rem_cal.format(0));
        $('#carb_total2').html(rem_cab.format(0));
        $('#fat_total2').html(rem_fat.format(0));
        $('#prot_total2').html(rem_prot.format(0));

        $('#cal_total3').val(total_cal);
        $('#carb_total3').val(total_cab);
        $('#fat_total3').val(total_fat);
        $('#prot_total3').val(total_prot);

        console.log(food_list);        
    }
</script>
<!--
    <td>Food 1</td>
                                                <td>1</td>
                                                <td>100</td>
                                                <td>100</td>
                                                <td>100</td>
                                                <td>100</td>
                                                <td class="text-nowrap">
                                                    <a href="" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger btn-hapus"></i> </a>
                                                </td>
-->