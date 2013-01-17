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
                <td><?php echo date("M Y"); ?></td>
            </tr>
            
            <tr>
                <th>Member Number</th><td><?php echo $employee -> Employee_Number; ?></td>
                <th>Work Status: </th><td><?php echo $employee -> Employment_Status; ?></td>
            </tr>
            
             <tr>
                <th>Bank Details: </th><td><?php echo $employee -> Bank_Name; ?></td>
                
            </tr>
            
            <tr>
                <th></th><td>Acc No <?php echo $employee -> Account_Number; ?></td>
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
            <td>Basic Salary</td>
            <td id="salary"> <?php echo $employee -> Job_Groups -> Salary; ?></td>
            <td>Taxation</td>
            <td><input type="text" id="tax" value="0" onchange="dave()"/></td>             
        </tr>
        <tr id="newtaxrow">
            <td></td>
            <td></td>
            <td></td>
            <td><input type="hidden" value="0" id="newtaxfield" /></td>
            <td><a id="new_tax">Add new taxfield</a></td>
        </tr>
        <tr>
           <th>Gross Earnings</th>
           <th id="amount"></th>   
           <td></td>
           <td><input type="hidden" id="totalothertaxvalue" value="0"/></td>                   
        </tr>
        
        <tr>
           <th></th>
           <th></th>   
           <th>Net Salary Transfered</th>
           <td id="net"></td>                   
        </tr>
        
    </table>
    
    </div>
</div>


<script>
	function dave() {
		var val1 = parseInt(document.getElementById('salary').innerText);
		var val2 = parseInt(document.getElementById('tax').value);
		var val3 = parseInt(document.getElementById('totalothertaxvalue').value);

		var total = val1 - (val2 + val3);
		document.getElementById("net").innerHTML = total;
	}

</script>

<script>
	$("#new_tax").click(function() {
		$(document.getElementById("newtaxrow")).replaceWith('<tr id="newtaxrow" class="newtaxrow"><td></td><td></td><td></td><td><input type="text"  value="0"  id="newtaxfield" class="newtaxfield"/></td><td><a id="clonetax">Add new tax field</a></td></tr>');

		$("#clonetax").click(function() {
			$(".newtaxrow:last").clone(true).insertAfter(".newtaxrow:last");
			$(".newtaxrow:last").find(":input").val("0");
            
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

