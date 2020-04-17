      <div class="panel">
        <div class="panel-heading">
          <h4 class="panel-title"> <?php echo $title;?> </h4>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
          	<?php //pd($list);?>
          
            <table id="dataTable1" class="table table-bordered table-striped-col display"  cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Name</th>
               
                  <th>Email</th>
                  <th>Password</th>
                  <th>Referredby</th>
                  <th>IP address</th>
                  <th>Join Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
        <?php if($list){?>
          	<?php foreach($list as $col){ ?>
                <tr>
                  <td><?php echo $col->fullname. " (" .$col->username . ")";?></td>
     
                  <td><?php echo $col->email;?></td>
                  <td><?php echo $col->password;?></td>
                  <td><?php echo $col->referid;?></td>
                  <td><?php echo $col->ip;?></td>
                  <td><?php echo date("d-m-Y",$col->updatetime);?></td>
                  <td>
					           <?php if($col->flag==1){?>
                        <a href="<?php echo base_url();?>admin/suspend/<?php echo $col->id;?>" class="btn btn-xs btn-danger">Suspend</a>
                      <?php }elseif($col->flag==0){?>  
                         <a href="<?php echo base_url();?>admin/activate/<?php echo $col->id;?>" class="btn btn-xs btn-success">Active</a>
                      <?php }?>
                  </td>
                </tr>
        <?php }?>
          	<?php } ?>  
              </tbody>
            </table>
          </div>
        </div>
      </div><!-- panel -->
      <iframe id="txtArea1" style="display:none"></iframe>


<button id="btnExport" onclick="fnExcelReport();"> EXPORT </button>
<script>
function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('dataTable1'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
</script>
