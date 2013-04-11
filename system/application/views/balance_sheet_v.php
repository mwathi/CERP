<style>
	.reporttable td {
		border-bottom: 1px solid #000000;
		text-align: left
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
            
            
                        <?php
                        echo "<tr>
                        
                        <td style=border-bottom:0></td><td>Bank</td><td><a href='" . base_url() . "journal_entries/transactions/' >" . $partakings -> Transaction_Value . "</a></td>
                        
                        </tr>";
                        echo "<tr><td></td><td>Total</td><td id=partakings>" . $partakings -> Transaction_Value . "</td></tr>";
                        ?>
                    
            <tr>
                <th>Other Current Assets</th><th></th><th></th>
            </tr>
                           <tr><td style="border-bottom: 0"></td><td>Undeposited Funds</td><td id="currentassets">
                           	<a href="<?php echo base_url().'journal_entries/undepositedfunds'?>"><?= $incomeTotal -> Total ?></a></td>
                           	<?php if($incomeTotal -> Total != '' || $incomeTotal -> Total != NULL || $incomeTotal -> Total != 0){
                           		?>
                           		<th>
                           		<a href="<?php echo base_url().'journal_entries/depositUndepositedFunds/'.$incomeTotal -> Total.'/'.$partakings -> Transaction_Value?>">Deposit Unallocated Funds</a>
                           	</th>
                           	<?php }else{
                           		
                           	}?>
                           	
                           	</tr>
                        <tr><td style="border-bottom: 0"></td><td>Property, Furniture and Equipment</td><td id="fixedassets"><a href="<?php echo base_url().'journal_entries/asset_transactions/'?>"><?=$fixedassetTotal -> Total ?></a> </td></tr>                       
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
                        echo "<tr><td></td><td>Total</td><td id=accountspayable>" . $accountspayable -> Accounts_Payable . "</td></tr>";
                        ?>
                    
            <tr>
                <th>Equity</th><th></th><th></th>
            </tr>
            
            <tr>
                <td style="border-bottom: 0"></td><td>Opening Balance Equity</td><td id="obe"><a href="<?=base_url().'journal_entries/openingbalance/' ?>" > <?=$obe -> Opening_Balance_Equity; ?></a></td></tr>
            <tr>
                <td style="border-bottom: 0"></td><td>Net Income</td><td id="totalincomes"><a href="<?=base_url().'journal_entries/netincome/' ?>" ><?=($incomeTotal -> Total) - ($expenseTotal -> Total); ?></a></td></tr> 
            <tr>
            	<td style="border-bottom: 0"></td><td>Deposited Funds</td><td id="depositedfunds"><?php if($bankTotal -> Total != 0){echo $bankTotal -> Total;}else{echo "0";};?></td></tr>
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
	$(function() {
		if (document.getElementById("currentassets").innerText == '' && document.getElementById("fixedassets").innerText == '') {
			document.getElementById("totalassets").innerText = 0;
		}//if both blank, 0
		else if(document.getElementById("fixedassets").innerText == ''){
		    document.getElementById("totalassets").innerText = parseInt(document.getElementById("currentassets").innerText);
		}//if only FA blank, CA = TA
		else if(document.getElementById("currentassets").innerText == ''){
            document.getElementById("totalassets").innerText = parseInt(document.getElementById("fixedassets").innerText);
		}//if only CA blank,  FA = TA
		else {
			document.getElementById("totalassets").innerText = parseInt(document.getElementById("fixedassets").innerText) + parseInt(document.getElementById("currentassets").innerText);
		}
	    document.getElementById("netassets").innerText = parseInt(document.getElementById("partakings").innerText) + parseInt(document.getElementById("totalassets").innerText);

		if (document.getElementById("accountspayable").innerText == '') {
			document.getElementById("netequity").innerText = parseInt(document.getElementById("totalincomes").innerText) + parseInt(document.getElementById("obe").innerText) + parseInt(document.getElementById("depositedfunds").innerText);
			document.getElementById("netliabilities").innerText = parseInt(document.getElementById("netequity").innerText);
		} else {
			document.getElementById("netequity").innerText = parseInt(document.getElementById("totalincomes").innerText) + parseInt(document.getElementById("obe").innerText) + parseInt(document.getElementById("depositedfunds").innerText);
			document.getElementById("netliabilities").innerText = parseInt(document.getElementById("netequity").innerText) + parseInt(document.getElementById("accountspayable").innerText);
		}

	})
</script>