    <div class="bannerContainer">
        <div class="bnTop">
            <div class="bnTopInner">
                <div class="bnContentLeft">
                    <h3>Get your Money doubled</h3>
                        <a href="<?php echo base_url();?>welcome/signup" title="">get <span>started</span></a>
                </div>
            </div>
        </div>

    </div>

    <div class="calculateContainer">
        <div class="bnBot">
            <div class="bnBotInner">
                <div class="bnBotInner_Part clearfix">
                    <?php //pd($package);?>
                    <?php if($package){ 
							$i=1;
                           foreach($package as $p){
                    ?>
                    <div class="animated BotPart BotPart<?php echo $i; ?>">
                        <div class="tittle">
                            <?php echo $p->packagename;?>
                        </div>
                        <div class="content">
                            <h3><?php echo $p->profitpercentage;?>%</h3>
                            <span></span>
                            <p><?php echo $p->tagline;?></p>
                            <p class="small"></p>
                        </div>
                        <div class="depos">
                            $<?php echo $p->mindeposit;?>  - $<?php echo $p->maxdeposit;?>
                        </div>
                    </div>
                        <?php 
                        $i++; 
                            }
                          }
                        ?>

                    <!---<div class="animated BotPart BotPart5" >
                        <div class="tittle">
                            plan 5
                        </div>
                        <div class="content">
                            <h3>5985%</h3>
                            <span></span>
                            <p>After 37 Days</p>
                            <p class="small">Min - $1</p>
                        </div>
                        <div class="depos">
                            Max - $500,000
                        </div>
                    </div>----->
                </div>
            </div>
        </div>
    </div>


 <!-- end feature -->
   
    <div class="calculateContainer">
        <div class="bnBot">
            <div class="bnBotInner">
				<div id="" role="form">
					<form class="form-inline">
						  <div class="form-group">
							<label for="" class="callabel">SELECT DEPOSIT PLAN:</label><br/>
							<select id="packageid" class="form-control width250 " style="width: 245px">
							<?php  if($package){
										foreach($package as $packlist){
									?>
								<option value="<?php echo  $packlist->id;?>"><?php echo  $packlist->packagename;?></option>
							<?php 		}
									}
								?>
							</select>
						  </div>
						  <div class="form-group">
							<label for="" class="callabel">DEPOSIT AMOUNT($):</label><br/>
							<input type="text" class="form-control width250" id="depositamount" value="0" >
						  </div>
						  
						   <div class="form-group">
							<label for="" class="callabel">TOTAL PROFIT %:</label><br/>
							<input type="text" class="form-control width250" id="totalprofitpercent" disabled="disabled">
						  </div>
						  
						   <div class="form-group">
							<label for="" class="callabel">	TOTAL PROFIT IN $:</label><br/>
							<input type="text" class="form-control width250" id="totalprofit" disabled="disabled">
						  </div>
						  
						</form>
				</div>
			</div>	
		</div>	
	</div>

<script>
$(document).ready(function(){
  
   
  $("#packageid").change(function (e){
	   var packageid = $("#packageid").val();
	   var depositamount = $("#depositamount").val();
	  
	     $.ajax({
                 method: "POST",                                         
                 url: "<?php base_url();?>Calculator",
                 data :{packageid:packageid,depositamount:depositamount},             
				 success: function(data){
				
					var caldata = JSON.parse(data);
						console.log(caldata.percentage);
					$("#totalprofitpercent").val(caldata.percentage);
					$("#totalprofit").val(caldata.totalprofit);
                  },
				 error: function(data){
                        // error message on unsuccess                          
                  }
               });//end of ajax
	  
	  
  });
  
  
    $("#depositamount").keyup(function (e){
	   var packageid = $("#packageid").val();
	   var depositamount = $("#depositamount").val();
	  
	     $.ajax({
                 method: "POST",                                         
                 url: "<?php base_url();?>Calculator",
                 data :{packageid:packageid,depositamount:depositamount},             
				 success: function(data){
				
					var caldata = JSON.parse(data);
						console.log(caldata.percentage);
					$("#totalprofitpercent").val(caldata.percentage);
					$("#totalprofit").val(caldata.totalprofit);
                  },
				 error: function(data){
                        // error message on unsuccess                          
                  }
               });//end of ajax
	  
	  
  });
  
   
});
</script>	
    
    <div class="projectContainer">
        <div class="projectInner">
            <h2 class="project-title public-title">Live Project Statistics </h2>
            <div class="projectStatictis">
                <div>
                    <h3>$ <?php echo number_format($totaldeposit[0]->totaldeposit,0); ?></h3>
                    <p>Total deposits</p>
                </div>
                <div>
                    <h3><?php echo $totalmember;  ?></h3>
                    <p>Total accounts</p>
                </div>
                <div>
                    <h3>$  <?php echo number_format($totalwithdraw[0]->totalwithdraw,0); ?></h3>
                    <p>Total withdraw</p>
                </div>
                <div>
                    <h3>5</h3>
                    <p>running days</p>
                </div>
                <div>
                    <h3><?php echo $lastmember[0]->username;?></h3>
                    <p>Last Member</p>
                </div>
                <div>
                    <h3><?php echo rand(50,95);?></h3>
                    <p>visitors online</p>
                </div>
            </div>
            <div class="projectContent">
                <div class="projectTab">
                    <table class="table table-responsive table-stripe table-bordered">
                        <tr>
                                <th class="text-center"> Latest Deposit </th> 
                               <th class="text-center"> Latest Withdraw </th>
                        </tr> 

                        <tr>
                                <td> 
                                    <table class="table table-stripe">
									<?php if($lastdeposit){?>
									<?php 	foreach($lastdeposit as $ld){?>
                                        <tr>
                                            <td> <?php echo $ld->username; ?> </td> <td> $ <?php echo $ld->amount; ?> </td>
                                        </tr>

                                     
									<?php }
									}?>
                                    </table>
                                </td> 
                                <td> 
                                    <table class="table table-stripe">
                                        <?php if($lasthwithdraw){?>
									<?php 	foreach($lasthwithdraw as $lw){?>
                                        <tr>
                                            <td> <?php echo $lw->username; ?> </td> <td> $ <?php echo $lw->amount; ?> </td>
                                        </tr>

                                     
									<?php }
									}?> 
                                    </table>
                                </td>
                        </tr> 
                    </table> 
                </div>
            
            </div>
        </div>
    
</div>



    <div class="featureContainer">
        <div class="featureInner">
            <h2 class="feature-title public-title">Our Features</h2>
            <div class="feature-gree">
            <img src="<?php echo base_url();?>assetshome/styles/img/icon_gree.png">
                <p>Greenbar ev ssl</p>
            </div>
            <div class="feature-gree">
            <img src="<?php echo base_url();?>assetshome/styles/img/icon_uk.png">
                <p>UK company registration</p>
            </div>
            <div class="feature-gree">
            <img src="<?php echo base_url();?>assetshome/styles/img/icon_gc.png">
                <p>GC Licenced</p>
            </div>
            <div class="feature-gree">
            <img src="<?php echo base_url();?>assetshome/styles/img/icon_ins.png">
                <p>instant payments</p>
            </div>
        </div>
    </div>