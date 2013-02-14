<div id="view_content">
    <div align="center">
        <table class="reporttable">
            <tr class="yellow">
                <th>Ledger Information By Date</th>
            </tr>
                    <?php
                    foreach($transactiondates as $transactiondata){?>
                        <tr>                                                                        
                        <td><?php echo date('F Y', strtotime($transactiondata -> Date )); ?></td>
                        <td>
                            <a href="<?php echo base_url()."journal_entries/assetAccounts/".date('n', strtotime($transactiondata -> Date)); ?>" style="padding-right:3em"><u>Asset Accounts</u> 
                            </a>
                            
                            <a href="<?php echo base_url()."journal_entries/liabilityAccounts/".date('n', strtotime($transactiondata -> Date)); ?>" style="padding-right:3em"><u>Liability Accounts</u> 
                            </a>
                            
                            <a href="<?php echo base_url()."journal_entries/expenseAccounts/".date('n', strtotime($transactiondata -> Date)); ?>" style="padding-right:3em"><u>Expense Accounts</u> 
                            </a>
                            
                            <!--a href="<?php echo base_url()."journal_entries/assetAccounts/".date('n', strtotime($transactiondata -> Date)); ?>">Equity Accounts 
                                <?php echo date('F', strtotime($transactiondata -> Date )); ?>
                            </a-->
                        </td>
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
