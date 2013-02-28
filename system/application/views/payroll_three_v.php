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
		text-align: left;
	}
	#cash td, #cash th {
		border-bottom: 1px solid #CCC;
		border-left: 1px solid #CCC;
		padding: 0 0.5em;
		text-align: right;
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
                <td><?php echo $employee -> Employee -> Name; ?></td>
                
                <th>Pay Period: </th>
                <td><input type="text" style="border: 0" readonly="" value="<?php echo date("MY"); ?>" name="pay_period"/></td>
            </tr>
            
            <tr>
                <th>Employee Number</th><td><input type="text" style="border: 0" readonly="" value="<?php echo $employee -> Employee_Number; ?>" name="employee_number"/></td>
                <th>Work Status: </th><td><?php echo $employee -> Employee -> Employment_Status; ?></td>
            </tr>
            
             <tr>
                <th>Bank Details: </th><td><input type="text" style="border: 0" readonly="" value="<?php echo $employee -> Bank_Name; ?>" name="bank_details"/></td>
                
            </tr>
            
            <tr>
                <th></th><td>Acc No <input type="text" style="border: 0" readonly="" value="<?php echo $employee -> Account_Number; ?>" name="account_number"/></td>
            </tr>
            
            <tr>
            <th>KRA PIN:</th><td> <?php echo $employee -> Employee -> KRA_PIN; ?></td>
            
            </tr>    
            
            <tr>
                <th>NHIF Number:</th><td> <?php echo $employee -> Employee -> NHIF_Number; ?></td>    
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
            <td id=""><?php echo number_format($employee -> Employee -> Job_Groups -> Salary); ?></td>
            <td></td>
            <td></td>             
        </tr>
            <?php
            foreach ($othertaxdata as $taxdata) {
                if ($taxdata -> Deductions != "") {
                    echo "<tr><td></td><td></td><td>" . $taxdata -> Deductions . "</td><td>" . number_format($taxdata -> Total_Deductions) . "</td></tr>";
                }
            }
        ?>
        <tr>
            <th>Benefits</th>
            <td></td>
            <td></td><td></td>
        </tr>
        <?php
        foreach ($othertaxdata as $taxdata) {
            if ($taxdata -> Benefit_Name != "") {
                echo "<tr><td>" . $taxdata -> Benefit_Name . "</td><td>" . number_format($taxdata -> Benefit_Value) . "</td><td></td><td></td></tr>";
            }
        }
        ?>
        <tr>
            <th>Total Benefits</th>
            <td><?php echo $employee -> Total_Benefits; ?></td>
            <td></td>
            <td></td>
        </tr>
        
        <tr>
        <th>Taxable Pay</th>
        <td><?php echo $employee -> Taxable_Pay; ?></td>
        <td></td>
        <td></td>
        </tr>
        
        <tr></tr>
        <tr>
            <td>Total Tax Payable</td>
            <td><?=$employee -> Total_Tax_Payable; ?></td>
            <td></td>
            <td></td>
        </tr>
        
        <tr>
            <td>Less Personal Relief</td>
            <td><?=$employee -> Personal_Relief; ?></td>
            <td></td>
            <td></td>
        </tr>
        
        <tr>
            <th>PAYE to be deducted</th>
            <th><?=$employee -> PAYE ?></th>
            <td></td>
            <td></td>
        </tr>
        
        <tr>
           <th>Gross Earnings</th>
           <th id="amount"><?php echo $employee -> Employee -> Job_Groups -> Salary; ?></th>   
           <td></td>
           <td><input type="hidden" id="totalothertaxvalue" value="0"/></td>                   
        </tr>
        
        <tr>
           <th></th>
           <th></th>   
           <th>Net Salary Transfered</th>
           <td><?php echo number_format($employee -> Net_Salary); ?></td>                   
        </tr>

        
    </table>
    
    </div>
</form>
</div>


