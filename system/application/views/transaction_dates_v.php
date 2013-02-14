<div id="view_content">
    <div align="center">
        <table class="reporttable">
            <tr class="yellow">
                <th>Transaction Date</th>
            </tr>
                    <?php
                    foreach($transactiondates as $transactiondata){?>
                        <tr>                                                                        
                        <td><?php echo date('F Y', strtotime($transactiondata -> Date )); ?></td>
                        <td><a href="<?php echo base_url()."journal_entries/monthlyJournal/".date('n', strtotime($transactiondata -> Date)); ?>">View Ledger Information For <?php echo date('F', strtotime($transactiondata -> Date )); ?></a></td>
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
