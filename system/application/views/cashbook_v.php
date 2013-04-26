<div id="view_content">
    <div align="center">
        <table class="reporttable">
            <tr class="yellow">
                <th>Cashbook Information By Date</th>
            </tr>
            
            <tr>
            	<th>Date</th><th>Number</th><th>Payee</th><th>Account</th><th>Payment</th><th>Deposit</th><th>Balance</th>
            </tr>
            
            <?php
            	foreach($cashbookdata as$cashbook_data){
            	if($cashbook_data -> Account_Affected_2 == $bankid){
            ?>
            		<tr>
            			<td><?=$cashbook_data -> Date ?></td>
            			<td><?=$cashbook_data -> id ?></td>
            			<td><?=$cashbook_data -> Transaction ?></td>
            			<td><?=$cashbook_data -> Account_Affected_1 ?></td>
            			<td><?=$cashbook_data -> Account_Affected_2_Amount ?></td>
            			<td></td>
            			<td><?=$cashbook_data -> Ending_Balance ?></td>
            		</tr>
            <?php
			}else{
            ?>
            		<tr>
            			<td><?=$cashbook_data -> Date ?></td>
            			<td><?=$cashbook_data -> id ?></td>
            			<td><?=$cashbook_data -> Transaction ?></td>
            			<td><?=$cashbook_data -> Account_Affected_2 ?></td>
            			<td></td>
            			<td><?=$cashbook_data -> Account_Affected_2_Amount ?></td>
            			<td><?=$cashbook_data -> Ending_Balance ?></td>
            		</tr>
            <?php
			}
			}
            ?>
            
            <tr height="40px"></tr>
            <?php if($incomeTotal -> Total != 0 || $incomeTotal -> Total != ''){
            ?>	
            <tr>
            	<th>Total Undeposited Funds</th>
            	<td><?= $incomeTotal -> Total ?></td>
            	<th>Deposit to this account?</th>
            	<th><a href="#" id="yes">Yes</a></th>
            	<th><a href="#" id="no">No</a></th>
            </tr>
            <?php
            }?>

            <tr height="40px"></tr>
            
            <tr>
            	<th colspan="2"><div id="formdiv"></div></th>
            </tr>
        </table>      
    </div>
</div>

<input type="hidden" name="limit" value="<?= $limit; ?>" />
<script>
	$(function() {
		$("#yes").click(function() {
			$("#formdiv").replaceWith("<form action=<?php echo base_url().'journal_entries/savefunds'?> id=depositform  method=post enctype=multipart/form-data><input type=text name=depositvalue id=depositvalue /><span id=submitter><input type=submit value=Deposit /></span><input type=hidden name=totalundepositedfunds value=<?= $incomeTotal -> Total; ?> id=totalundepositedfunds /><input type=hidden name=accountbalance value=<?= $transactionvalue; ?> /><input type=hidden name=bankaccount value=<?= $bankid; ?> /></form>");

		})
		$("#no").click(function() {
			$("#depositform").replaceWith("<div id=formdiv></div>");
		})
	})

</script>