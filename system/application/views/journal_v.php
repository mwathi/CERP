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
    <div align="center">
        <table class="reporttable">
            <tr class="yellow">
                <th>Date</th>
                <th colspan="2" style="text-align: center">Account</th>
                <th>Debit</th>
                <th>Credit</th>
            </tr>
                    <?php
                    foreach($transactiondates as $transactiondata){?>
                        <tr>                                                                        
                            <td><?php echo date('M d', strtotime($transactiondata -> Date )); ?></td>
                            <td><?php echo $transactiondata -> Account_Affected_1; ?></td>
                            <td></td>
                            <td><?php echo $transactiondata -> Account_Affected_1_Amount; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><?php echo $transactiondata -> Account_Affected_2; ?></td>
                            <td></td>
                            <td><?php echo $transactiondata -> Account_Affected_2_Amount; ?></td>
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
