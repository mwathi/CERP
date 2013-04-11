<script>
	$(function() {
		var salo = parseInt(document.getElementById("salary").value)
		if (salo < 9999) {
			document.getElementById("nhif").innerText = 0
		} else if (salo > 9999 && salo < 10999) {
			document.getElementById("nhif").innerText = 220
		} else if (salo > 10999 && salo < 11999) {
			document.getElementById("nhif").innerText = 240
		} else if (salo > 11999 && salo < 12999) {
			document.getElementById("nhif").innerText = 260
		} else if (salo > 12999 && salo < 13999) {
			document.getElementById("nhif").innerText = 280
		} else if (salo > 13999 && salo < 14999) {
			document.getElementById("nhif").innerText = 300
		} else {
			document.getElementById("nhif").innerText = 320
		}
		
		document.getElementById('gross_earnings').value = parseInt(document.getElementById("totalbenefits").value) + parseInt(document.getElementById("salary").value);
	})
</script>
<style>
	#view_content {
		font: .85em "Segoe UI", Segoe, Arial, Sans-Serif;
	}
	input {
		font: 1em "Segoe UI", Segoe, Arial, Sans-Serif;
	}
	#nameholder {
		background-color: purple;
		height: 25px;
		padding: 10px;
	}

	#employeedata {
		border: 1px solid #999999;
		width: 60%;
		margin-left: 20%;
		height: 600px
	}
	#details {
		border-bottom: 1px solid #999999;
		width: 100%;
	}
	#details th {
		text-align: right
	}
	#details {
		text-align: left
	}
	#cash td, #cash th {
		border-bottom: 1px solid #CCC;
		border-left: 1px solid #CCC;
		padding: 0 0.5em;
	}

	#cash td+ td {
		border-left: 1px solid #CCC;
		text-align: center;
	}
</style>

<div id="view_content">
    <?php
    $attributes = array('enctype' => 'multipart/form-data');
    echo form_open('payroll_management/save', $attributes);
    echo validation_errors('
<p class="error">', '</p>
');
?>
    <br />
    <div id="employeedata" align="center">
    <div id="nameholder" align="center">        
        <p style="color: #FFF; float: right"><?php echo date("F dS Y"); ?></p>
    </div>
    <table id="details">    
            <tr>
                <th>Employee Name: </th>
                <td><?php echo $employee -> Name; ?></td>
                
                <th>Pay Period: </th>
                <td><input type="text" style="border: 0" readonly="" value="<?php echo date("MY"); ?>" name="pay_period"/></td>
            </tr>
            
            <tr>
                <th>Employee Number</th><td><input type="text" style="border: 0" readonly="" value="<?php echo $employee -> Employee_Number; ?>" name="employee_number"/></td>
                <th>Work Status: </th><td><?php echo $employee -> Employment_Status; ?></td>
            </tr>
            
             <tr>
                <th>Bank Details: </th><td><input type="text" style="border: 0" readonly="" value="<?php echo $employee -> Banks -> Name; ?>" name="bank_details"/></td>
                
            </tr>
            
            <tr>
                <th></th><td>Acc No <input type="text" style="border: 0" readonly="" value="<?php echo $employee -> Account_Number; ?>" name="account_number"/></td>
            </tr>
            
            <tr>
            <th>KRA PIN:</th><td> <?php echo $employee -> KRA_PIN; ?></td>
            
            </tr>    
            
            <tr>
                <th>NHIF Number:</th><td> <?php echo $employee -> NHIF_Number; ?></td>    
            </tr>
    </table>
    <br />
    <table id="cash">
        <tr>
            <th>Earnings</th>   
            <th>Amount</th>
            <th>Remittances</th>
            <th>Amount</th>              
        </tr>
        
        
        
        <tr>
            <td><input type="text" name="earnings" value="Basic Salary" style="border: 0; font: .85em "Segoe UI", Segoe, Arial, Sans-Serif" readonly=""/></td>
            <td id=""><input id="salary" type="text" name="earnings_amount" value="<?php echo $employee -> Job_Groups -> Salary; ?>" /></td>
                  <td>NHIF</td>
            <td id="nhif">0</td>          
        </tr>
        
        <tr>
            <td></td>
            <td></td>
      <td>NSSF</td>
            <td id="nssf">200</td>
        </tr>
        
        
        <?php
        echo "<tr><th>Benefits</th><td></td><td></td><td></td></tr>";
        foreach ($jobgroupinformation as $jobgroupinfo) {
            echo "<tr>
                <td><input type=text name=benefitname[] value='" . $jobgroupinfo -> Name . "' readonly style='border:0'/></td>
                <td><input type=text name=benefitvalue[] value='" . $jobgroupinfo -> Rate . "' readonly style='border:0'/></td>
                <td></td><td></td>
            </tr>";
        }
        
        foreach ($sumjobgroupinformation as $sumbenefits) {
            echo "<tr>
                <td><b>Total Benefits</b></td>
                <td><input type=text name=totalbenefits id=totalbenefits value='" . $sumbenefits -> Rate . "' readonly style='border:0'/></td>
                <th>Deductions</th><td></td>
            </tr>";
        }
        
        ?>
        
        <tr>
            <th>Taxable Pay</th>
            <td><input type="text" name="taxablepay"  id="taxablepay" value="0" readonly style="border: 0"/></td>
            <td></td>
            <td>
            </td>
        </tr>
        <tr id="newtaxrow">
            <td></td>
            <td></td>
            <td></td>
            <td><input type="hidden" value="0" id="newtaxfield"/></td>
            <td><a id="new_tax">Add new taxfield</a></td>
        </tr>
        <tr>
            <td>Total Tax Payable</td>
            <th id=""><input type="text" id="totaltaxpayable" name="totaltaxpayable" value="" readonly="" style="border: 0" /></th>
            <td></td>
            <td></td>
        </tr>
        
        <!--personal relief-----------------
            ---
            ---
            --->
         <tr>
            <td>Less Personal Relief</td>
            <th id=""><input type="text" id="personalrelief" name="personalrelief" value="1162" readonly="" style="border: 0" /></th>
            <td></td>
            <td></td>
        </tr>
        
        
         <!--PAYE----------------
            ---
            ---
            --->
         <tr>
            <th>PAYE to be Deducted</th>
            <th id=""><input type="text" id="PAYE" name="PAYE" value="" readonly="" style="border: 0; font-weight: bold" /></th>
            <td></td>
            <td></td>
        </tr>
        
        
        <tr>
           <th>Gross Earnings</th>
           <th id="amount"><input type="text" name="gross_earnings" id="gross_earnings" value="0" readonly style="border:0; font-weight: bold; text-align: left"/></th>   
           <th>Total Deductions</th>
           <td><input type="text" style="border: 0" readonly="" id="totalothertaxvalue" name="totalothertaxvalue" value="0"/></td>                   
        </tr>
        
        <tr>
           <th></th>
           <th></th>   
           <th>Net Salary Transfered</th>
           <td><input type="text" name="net_salary" id="net" value="0" readonly style="border:0"/></td>                   
        </tr>
        <input type="hidden" value="<?=$partakings -> Transaction_Value;?>" name="opening_balance" />        
        
        <tr>
           <td><input name="submit" type="submit" value="Process Payment" class="button" style="width: 150px; height: 30px; font-size: 13px"></td>
        </tr>
        
    </table>
    
    </div>
</form>
</div>
<script>
	$("#salary").change(function() {
		document.getElementById("taxablepay").value = parseInt(document.getElementById("totalbenefits").value) + parseInt(document.getElementById("salary").value);
		document.getElementById("net").value = document.getElementById("gross_earnings").value;

		var salo = parseInt(document.getElementById("salary").value)
		if (salo < 9999) {
			document.getElementById("nhif").innerText = 0
		} else if (salo > 9999 && salo < 10999) {
			document.getElementById("nhif").innerText = 220
			var netdeductions = document.getElementById("nhif").innerText + document.getElementById("nssf").innerText
		} else if (salo > 10999 && salo < 11999) {
			document.getElementById("nhif").innerText = 240
		} else if (salo > 11999 && salo < 12999) {
			document.getElementById("nhif").innerText = 260
		} else if (salo > 12999 && salo < 13999) {
			document.getElementById("nhif").innerText = 280
		} else if (salo > 13999 && salo < 14999) {
			document.getElementById("nhif").innerText = 300
		} else {
			document.getElementById("nhif").innerText = 320
		}

		$(function() {
			var chargeablePay = parseInt(document.getElementById('taxablepay').value);

			if (chargeablePay < 11135) {
				document.getElementById('totaltaxpayable').value = chargeablePay;
				var totaltaxpayable = 0;
				var PAYE = 0;
				document.getElementById('PAYE').value = PAYE;
				
			} else {
				if (chargeablePay > 11135) {//case 10%
					chargeablePay = chargeablePay - 10164;
					document.getElementById('totaltaxpayable').value = chargeablePay;
					if (chargeablePay > 9576) {//case 15%
						chargeablePay = chargeablePay - 9576;
						document.getElementById('totaltaxpayable').value = chargeablePay;
						if (chargeablePay > 9576) {//case 20%
							chargeablePay = chargeablePay - 9576;
							document.getElementById('totaltaxpayable').value = chargeablePay;
							if (chargeablePay > 9576) {//case 25%
								chargeablePay = chargeablePay - 9576;
								document.getElementById('totaltaxpayable').value = chargeablePay;
								if (chargeablePay > 9576) {//case 30%
									chargeablePay = Math.floor(((chargeablePay * 30) / 100));

									////////////////////////////////////
									/////calculate tax payable here////
									//////////////////////////////////
									var totaltaxpayable = 1016 + 1436 + 1915 + 2394 + chargeablePay;
									document.getElementById('totaltaxpayable').value = totaltaxpayable;
									var PAYE = totaltaxpayable - parseInt(document.getElementById('personalrelief').value);
									document.getElementById('PAYE').value = PAYE;
								} else {
									chargeablePay = Math.floor(((chargeablePay * 30) / 100));
									//document.getElementById('net').value = chargeablePay;
									var totaltaxpayable = 1016 + 1436 + 1915 + 2394 + chargeablePay;
									document.getElementById('totaltaxpayable').value = totaltaxpayable;
									var PAYE = totaltaxpayable - parseInt(document.getElementById('personalrelief').value);
									document.getElementById('PAYE').value = PAYE;
								}
							} else {
								var fourthleveltax = Math.floor((chargeablePay * 25) / 100);
								var totaltaxpayable = 1016 + 1436 + 1915 + fourthleveltax;
								document.getElementById('totaltaxpayable').value = totaltaxpayable;
								var PAYE = totaltaxpayable - parseInt(document.getElementById('personalrelief').value);
								document.getElementById('PAYE').value = PAYE;
							}
						} else {
							var thirdleveltax = Math.floor((chargeablePay * 20) / 100);
							var totaltaxpayable = 1016 + 1436 + thirdleveltax;
							document.getElementById('totaltaxpayable').value = totaltaxpayable;
							var PAYE = totaltaxpayable - parseInt(document.getElementById('personalrelief').value);
							document.getElementById('PAYE').value = PAYE;
						}
					} else {
						var secondleveltax = Math.floor((chargeablePay * 15) / 100);
						var totaltaxpayable = 1016 + secondleveltax;
						document.getElementById('totaltaxpayable').value = totaltaxpayable;
						var PAYE = totaltaxpayable - parseInt(document.getElementById('personalrelief').value);
						document.getElementById('PAYE').value = PAYE;
					}
				} else {
					var firstleveltax = Math.floor((chargeablePay * 10) / 100);
					var totaltaxpayable = 1016 + firstleveltax;
					document.getElementById('totaltaxpayable').value = totaltaxpayable;
					var PAYE = totaltaxpayable - parseInt(document.getElementById('personalrelief').value);
					document.getElementById('PAYE').value = PAYE;
				}

			}//end else
			document.getElementById('gross_earnings').value = parseInt(document.getElementById("taxablepay").value) - parseInt(document.getElementById('PAYE').value);
			document.getElementById("net").value = parseInt(document.getElementById('gross_earnings').value) - (parseInt(document.getElementById('nhif').innerText) + parseInt(document.getElementById('nssf').innerText));

		})
	})

	$("#new_tax").click(function() {
		$(document.getElementById("newtaxrow")).replaceWith('<tr id="newtaxrow" class="newtaxrow"><td></td><td></td><td><input type="text" id="newtaxname" class="newtaxname" name="deductions[]"/></td><td><input type="text"  value="0"  id="newtaxfield" class="newtaxfield" name="deductions_amount"/></td><td><a id="clonetax">Add new tax field</a></td></tr>');

		$("#clonetax").click(function() {
			$(".newtaxrow:last").clone(true).insertAfter(".newtaxrow:last");
			$(".newtaxrow:last").find(":input.newtaxfield").val("0");
			$(".newtaxrow:last").find(":input.newtaxname").val("");
		});
		totalothertax = 0;

		$('#newtaxfield').focusout(function() {
			$(".newtaxfield").each(function(index) {
				totalothertax += parseInt($(this).val());
			});
			document.getElementById("totalothertaxvalue").value = totalothertax;
			totalothertax = 0
			document.getElementById("net").value = parseInt(document.getElementById("gross_earnings").value) - parseInt(document.getElementById("totalothertaxvalue").value);
		});

	});

</script>