<div class="row">
						<div class="col-md-12">
							<div class="infobox">

								<div class="row">
									<div class="col-md-4">
										<div class="acr_Part1 acr_Part11">
											<h4>username:</h4>
											<h3><?php echo $commondata['memberinfo']['0']->username;?></h3>
										</div>
									</div>
									<div class="col-md-4">	
										<div class="acr_Part1 acr_Part12">
											<h4>Registration Date:</h4>
											<h3><?php echo date("d-M-Y",$commondata['memberinfo']['0']->updatetime);?></h3>
										</div>
									</div>
									<div class="col-md-4">	
										<div class="acr_Part1 acr_Part13">
											<h4>Total Invest:</h4>
											<h3>$ <?php echo $commondata['totaldeposit'];?></h3>
										</div>
									</div>	
								</div>		
							</div>
						</div>	
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="top15"> </div>
							<div class="acr_Part2 acr_Part21 ">
								<div class="acr_Part2_title">
									<p>Account Balance</p>
									<?php // pd($commondata);?>
									<h3>$<b><?php echo number_format($commondata['totalactivebalance'],2);?></b></h3>
								</div>
								<div class="acr_Part2_ctn">
									<a href="<?php echo base_url();?>account/withdraw">request payment</a>
								</div>
							</div>
						<div class="acr_Part2 acr_Part22 ">
							<div class="acr_Part2_title">
								<p>earned total</p>
								<h3>$<b><?php echo number_format($commondata['totalearning'],2); ?></b></h3>
							</div>
							<div class="acr_Part2_ctn">
								<a href="<?php echo base_url();?>account/deposit">make a deposit</a>
							</div>
						</div>
						<div class="acr_Part2 acr_Part23">
							<div class="acr_Part2_title">
								<p>active deposit</p>
								<h3>$<b><?php echo number_format($commondata['activedeposit'],2); ?></b></h3>
							</div>
							<div class="acr_Part2_ctn">
								<ul>
									<li>Last Deposit:<span>$<b><?php echo number_format($commondata['lastdeposit'],2); ?></b> <span></span></span></li>
									<li>Total Deposit:<span>$<b><?php echo number_format($commondata['activedeposit'],2); ?></b><span></span></span></li>
								</ul>
							</div>
						</div>
						<div class="acr_Part2 acr_Part24">
							<div class="acr_Part2_title">
								<p>total withdrawal</p>
								<h3>$<b><?php echo $commondata['totalwithdraw']; ?></b></h3>
							</div>
							<div class="acr_Part2_ctn">
								<ul>
									<li>Last Withdrawal: <span>$<b><?php echo number_format($commondata['lastwithdraw'],2); ?></b><span></span></span></li>
									<li>Pending Withdrawal: <span>$<b>0.00</b><span></span></span></li>
								</ul>
							</div>
						</div>
						</div>	
					</div>	