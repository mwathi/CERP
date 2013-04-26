<style>
    .reporttable td{
        border-bottom:1px solid #000000;
        text-align: left
    }
    .reporttable td+td{
        border-bottom:1px solid #000000;
        border-left: 0px;
        text-align: right
    }
</style>
<div id="view_content">
    <div align="center">
        <table class="reporttable">
            <tr class="yellow">
                <th>ID</th>
                <th>Src</th>
                <th>Date</th>
                <th>Memo</th>
                <th>Debit</th>
                <th>Credit</th>
                <th>Ending Balance</th>
            </tr>
            
            <tr>
                <td>Beginning Balance</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            
            <?php
                foreach($transactiondates as $transactions){
                    echo 
                    "<tr>
                        <td>".$transactions -> id."</td>.";
                        
                        if($transactions -> Account_Affected_1 == "Cash"){
                            echo "<td>CD</td>";
                        }else{
                            echo "<td>CR</td>";
                        }
                        echo "
                        <td>".$transactions -> Date."</td>
                        <td>".$transactions -> Transaction."</td>";
                        if($transactions -> Account_Affected_1 == "Cash"){
                            echo "<td class=debit>".number_format($transactions -> Account_Affected_1_Amount)."</td>";
                        }else{
                            echo "<td></td>";
                        }
                        if($transactions -> Account_Affected_2 == "Cash"){
                            echo "<td class=credit>".number_format($transactions -> Account_Affected_2_Amount)."</td>";
                        }else{
                            echo "<td></td>";
                        }
                        echo "
                        <td>".number_format($transactions -> Ending_Balance)."</td>
                    </tr>";
                }
            ?>
            
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td style="font-weight: bold">Total:</td>
                <td style="font-weight: bold"><?=number_format($transactiontotaldebit -> Account_Affected_1_Amount) ?></td>
                <td style="font-weight: bold"><?=number_format($transactiontotalcredit -> Account_Affected_2_Amount) ?></td>
                <td style="font-weight: bold"><?=number_format($endingbalance -> Transaction_Value) ?></td>
            </tr>
        </table>      
        
    </div>
</div>

