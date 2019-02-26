<div class="container">
<div class="row">
<div class="data-table-area">
<div class="container">
 <div class="row" style="height:500px;">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="data-table-list">
             <div class="basic-tb-hd">
                 <h2>Track Mobilizer</h2>
             </div>
           <form action="<?php echo base_url(); ?>tracking/usertrack" method="post" class="form-horizontal" id="tracking_form" name="edit_trade_handling_form">
               <div class="row" >
                   <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                     <div class="" id="">
                        <label>Select date</label>
                        <div class="input-group  nk-int-st">
                            <input type="text" name="selected_date" class="form-control datepicker" placeholder="Pick Date" autocomplete="off"/>
                        </div>
                    </div>
                   </div>
                      </div>
                    <div class="row">
               <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                 <div class="" id="">
                    <label>Select Mobilizer</label>
                    <div class="input-group  nk-int-st">
                      <select name="user_id" id="user_id" class=" ">
                        <?php  foreach ($res as $rows) {  ?>
                     <option value="<?php echo $rows->user_id; ?>">
                         <?php echo $rows->name; ?>
                     </option>
                     <?php      } ?>
                      </select>
                    </div>
                </div>
               </div>
                  </div>
                <div class="row">
               <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                    <label></label>
                   <div class="form-example-int">
                      <!-- <input type="submit" id="save" class="btn btn-info btn-fill center"  value="Save"> -->
                      <button type="submit" class="btn btn-info notika-btn-info waves-effect">Track</button>
                   </div>
               </div>
           </div>
             </form>
         </div>
     </div>
 </div>
</div>
</div>
<!-- Data Table area End-->
</div>
</div>
<style>
.datepicker table {
    margin: -4px;
  }
</style>
<script type="text/javascript">
    $('#tracking').addClass('active');
    $('#trackingmenu').addClass('active');
    $('#tracking_form').validate({ // initialize the plugin
   rules: {
       user_id:{required:true },
       selected_date:{required:true }

   },
   messages: {
         user_id: "Select User",
         selected_date: "Pick a Date"

       }
});
    </script>
