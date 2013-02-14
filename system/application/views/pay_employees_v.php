<?php error_reporting(0); ?>
<style>
	#view_content {
		font: .85em "Segoe UI", Segoe, Arial, Sans-Serif;
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
		height: 500px
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
                <th>Bank Details: </th><td><input type="text" style="border: 0" readonly="" value="<?php echo $employee -> Bank_Name; ?>" name="bank_details"/></td>
                
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
            <th>Deductions</th>
            <th>Amount</th>              
        </tr>
        
        <tr>
            <td><input type="text" name="earnings" value="Basic Salary" style="border: 0" readonly=""/></td>
            <td id=""><input id="salary" type="text" name="earnings_amount" value="<?php echo $employee -> Job_Groups -> Salary; ?>" readonly style="border:0"/></td>
            <td>Taxation</td>
            <td><input type="text" id="tax" value="0" onchange="dave()" name="taxation"/></td>             
        </tr>
        <tr id="newtaxrow">
            <td></td>
            <td></td>
            <td></td>
            <td><input type="hidden" value="0" id="newtaxfield"/></td>
            <td><a id="new_tax">Add new taxfield</a></td>
        </tr>
        <tr>
           <th>Gross Earnings</th>
           <th id="amount"><input type="text" name="gross_earnings" value="<?php echo $employee -> Job_Groups -> Salary; ?>" readonly style="border:0"/></th>   
           <td></td>
           <td><input type="hidden" id="totalothertaxvalue" value="0"/></td>                   
        </tr>
        
        <tr>
           <th></th>
           <th></th>   
           <th>Net Salary Transfered</th>
           <td><input type="text" name="net_salary" id="net" value="0" readonly style="border:0"/></td>                   
        </tr>
        
        <tr>
           <td><input name="submit" type="submit" value="Process Payment" class="button" style="width: 150px; height: 30px; font-size: 13px"></td>
        </tr>
        
    </table>
    
    </div>
</form>
</div>


<script>
	function dave() {
		var val1 = parseInt(document.getElementById('salary').value);
		var val2 = parseInt(document.getElementById('tax').value);
		var val3 = parseInt(document.getElementById('totalothertaxvalue').value);

		var total = val1 - (val2 + val3);
		document.getElementById("net").value = total;
	}

</script>

<script>
	$("#new_tax").click(function() {
		$(document.getElementById("newtaxrow")).replaceWith('<tr id="newtaxrow" class="newtaxrow"><td></td><td></td><td><input type="text" id="newtaxname" class="newtaxname" name="deductions[]"/></td><td><input type="text"  value="0"  id="newtaxfield" class="newtaxfield" name="deductions_amount[]"/></td><td><a id="clonetax">Add new tax field</a></td></tr>');

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
			dave();
			totalothertax = 0
		});

	});

</script>

