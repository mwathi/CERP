<style>
	.reporttable td {
		border-bottom: 1px solid #000000;
			text-align: right
	}
	.reporttable td+ td {
		border-bottom: 1px solid #000000;
		border-left: 0px;
	
	}
</style>
<div id="view_content">
    <div align="center">
        <table class="reporttable">
            <tr class="yellow">
                <th>BALANCE SHEET AS OF <?php echo date('F Y jS'); ?></th><th></th><th></th>
            </tr>
            
            <tr>
                <th>ASSETS</th><th></th><th></th>
            </tr>
            <tr>
                <th>Current Assets</th><th></th><th></th>
            </tr>
            
            
                        	<!--a href=' echo base_url() . "journal_entries/transactions/' >" . number_format($partakings -> Transaction_Value) . "</a-->
                        	<?php foreach($partakings as $part){?>
                        		<tr><th></th><td><a href="<?php echo base_url().'journal_entries/getCashbook/'.$part->bank_account.'/'.$part->transaction_value.'/'.$limit?>">Cash at <?php echo $part -> account ?></a></td>
                        		<td class="transaction_value">
                        		<a href="<?php echo base_url() . 'journal_entries/transactions/'.$part->bank_account ?>" >		
                        		<?php echo $part->transaction_value ?></a></td></tr>
                        	<?php
							}
                        	?>
                        <tr><td></td><td>Total</td><td id=""><?php echo $partak -> Total_Opening_Balance?></td></tr>
						
                    <input type="hidden" id="partakings" value="<?php echo $partak -> Total_Opening_Balance?>" />
            <tr>
                <th>Other Current Assets</th><th></th><th></th>
            </tr>
                           <tr>
                           	<td style="border-bottom: 0"></td>
                           	<td>Undeposited Funds</td>
                           	<input type="hidden" value="<?=  $incomeTotal -> Total ?>" id="currentassets" />
                           	<td id=""><a href="<?php echo base_url().'journal_entries/undepositedfunds/'.$limit?>"><?= number_format($incomeTotal -> Total) ?></a></td>
                           	<?php /*if($incomeTotal -> Total != '' || $incomeTotal -> Total != NULL || $incomeTotal -> Total != 0){
                           		?>
                           		<th>
                           		<a href="<?php echo base_url().'journal_entries/depositUndepositedFunds/'.$incomeTotal -> Total.'/'.$partakings -> Transaction_Value?>">Deposit Unallocated Funds</a>
                           	</th>
                           	<?php }else{
                           		
                           	}*/?>
                           	
                           	</tr>
                        <tr><td style="border-bottom: 0"></td><td>Property, Furniture and Equipment</td><td id="">
                        	<input type="hidden" id="fixedassets" value="<?php if($fixedassetTotal -> Total != 0){echo $fixedassetTotal -> Total;}else{echo "0";} ?>" />
                        	<a href="<?php echo base_url().'journal_entries/asset_transactions/'?>"><?=number_format($fixedassetTotal -> Total) ?></a> </td></tr>                       
                        <tr><td style="border-bottom: 0"></td><td>Total</td><td id="totalassets"></td></tr>
            <tr>
                <td height="20px" style="border-bottom: 0"></td>
            </tr>
            <tr>
                <td></td>
                <td><strong>Total Assets</strong> </td>
                <td id="" style="font-weight: bold"><a href="<?php echo base_url().'journal_entries/addassets'?>"><strong id="netassets"></strong></a></td>
            </tr>
            
            
            
            <!---
                Liabilities
                
            ------->
            <tr height="50px"></tr>
             <tr>
                <th>LIABILITIES &amp; EQUITY</th><th></th><th></th>
            </tr>
            <tr>
                <th>Current Liabilities</th><th></th><th></th>
            </tr>
                        <?php
                        echo "<tr><td style=border-bottom:0></td><td>Accounts Payable</td><td><a href='" . base_url() . "journal_entries/liability_transactions/' >
                        " . $accountspayable -> Accounts_Payable . "</a></td></tr>";
                        echo "<tr><td></td><td>Total</td><td id=>" . number_format($accountspayable -> Accounts_Payable) . "</td></tr>";
                        ?>
                    <input type="hidden" id="accountspayable" value="<?php echo $accountspayable -> Accounts_Payable ?>" />
            <tr>
                <th>Equity</th><th></th><th></th>
            </tr>
            
            <tr>
                <td style="border-bottom: 0"></td><td>Opening Balance Equity</td><td id=""><a href="<?=base_url().'journal_entries/openingbalance/' ?>" ><div id=""><?= $obe->Opening_Balance_Equity?></div></a></td></tr>
                <input type="hidden" id="obe" value="<?php echo $obe -> Opening_Balance_Equity ?>" />
            <tr>
                <td style="border-bottom: 0"></td><td>Net Income</td><td id=""><a href="<?=base_url().'journal_entries/netincome/' ?>" ><?=number_format(($incomeTotal -> Total) - ($expenseTotal -> Total)); ?></a></td></tr>
                <input type="hidden" id="totalincomes" value="<?=($incomeTotal -> Total) - ($expenseTotal -> Total); ?>" /> 
            <tr>
            	<td style="border-bottom: 0"></td><td>Bank Deposits</td><td id=""><?php if($bankTotal -> Total != 0){echo number_format($bankTotal -> Total);}else{echo "0";};?></td></tr>
            	<input type="hidden" value="<?php if($bankTotal -> Total != 0){echo $bankTotal -> Total;}else{echo "0";};?>" id="depositedfunds" />
            </tr>
            <tr>
                <td style="border-bottom: 0"></td><td>Total Equity</td><td id="netequity"></td></tr>
            <tr>
                <td height="20px" style="border-bottom: 0"></td>
            </tr>
            <tr>
                <td></td>
                <td><strong>Total Liabilities</strong> </td>
                <td><a href="<?php echo base_url().'journal_entries/netliabilities'; ?> " ><strong id="netliabilities"></strong></a></td>
            </tr>
        </table>      
        
    </div>
</div>

<script>
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

	$(function() {
		if (document.getElementById("currentassets").value == '' && document.getElementById("fixedassets").value == '') {
			document.getElementById("totalassets").innerText = 0;
		}//if both blank, 0
		else if(document.getElementById("fixedassets").value == ''){
		    document.getElementById("totalassets").innerText = (parseInt(document.getElementById("currentassets").value));
		}//if only FA blank, CA = TA
		else if(document.getElementById("currentassets").value == ''){
            document.getElementById("totalassets").innerText = (parseInt(document.getElementById("fixedassets").value));
		}//if only CA blank,  FA = TA
		else {
			document.getElementById("totalassets").innerText = (parseInt(document.getElementById("fixedassets").value) + parseInt(document.getElementById("currentassets").value));
		}
	    document.getElementById("netassets").innerText = (parseInt(document.getElementById("partakings").value) + parseInt(document.getElementById("totalassets").innerText));

		if (document.getElementById("accountspayable").value == '') {
			var netequity = (parseInt(document.getElementById("totalincomes").value) + parseInt(document.getElementById("obe").value) + parseInt(document.getElementById("depositedfunds").value));
			document.getElementById("netequity").innerText = netequity;
			
			document.getElementById("netliabilities").innerText = netequity;
		} else {
			var alt_netequity = (parseInt(document.getElementById("totalincomes").value) + parseInt(document.getElementById("obe").value) + parseInt(document.getElementById("depositedfunds").value));
			var alt_alt_netequity = (parseInt(document.getElementById("totalincomes").value) + parseInt(document.getElementById("obe").value) + parseInt(document.getElementById("depositedfunds").value));
			document.getElementById("netequity").innerText = alt_netequity;
			document.getElementById("netliabilities").innerText = (parseInt(alt_alt_netequity) + parseInt(document.getElementById("accountspayable").value));
		}

	})
	

</script>