<style>
    .reporttable td{
        border-bottom:1px solid #000000;
    }
    .reporttable td+td{
        border-bottom:1px solid #000000;
        border-left: 0px;
    }
</style>
<div id="view_content">
    <br />
    <a class="header_action_button" id="journal_entries" href="<?php echo site_url("journal_entries"); ?>">Journal Entries</a>
    <br /><br />
     <a class="header_action_button" id="journal_entries" href="<?php echo site_url("journal_entries/incomedates"); ?>">Income Statements</a>
     <br /><br />
     <a class="header_action_button" id="" href="<?php echo site_url("journal_entries/ledgerDates"); ?>">Ledger Entries</a>
     <br /><br />
     <a class="header_action_button" id="" href="<?php echo site_url("journal_entries/balanceDates"); ?>">Balance Sheets</a>

    <div align="center">
        <table class="reporttable">
            <tr class="yellow">
                <th>Date</th>
                <th>Memo</th>
                <th>Debit</th>
                <th>Credit</th>
            </tr>
                    <?php
                    $account_redefined = str_replace('_', ' ', $account);
                    echo "<tr><th>".$account_redefined."</th></tr>";
                    foreach($transaction as $transactiondata){
                    	if($transactiondata -> account_affected_2 == $account_redefined){
                        echo "<tr>
                        <td>". $transactiondata -> date ."</td>
                        <td>". $transactiondata -> transaction ."</td>
						<td>". $transactiondata -> account_affected_2_amount ."</td>
	                    <td></td>
	                    </tr>";
						}else{
						echo "<tr>
                        <td>". $transactiondata -> date ."</td>
                        <td>". $transactiondata -> transaction ."</td>
						<td></td>
	                    <td>". $transactiondata -> account_affected_2_amount ."</td>
	                    </tr>";	
						}
                        }
                    ?>
        </table>      
    </div>
</div>
