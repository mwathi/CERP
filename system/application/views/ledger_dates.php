<div id="view_content">
    <div align="center">
        <table class="reporttable">
            <tr class="yellow">
                <th>Ledger Information By Year</th>
            </tr>
                    <?php
                    foreach($transactiondates as $transactiondata){?>
                        <tr>                                                                        
                        <td><?php echo date('Y', strtotime($transactiondata -> Date )); ?></td>
                        <td>
                            <a href="<?php echo base_url()."journal_entries/yearlyLedger/".date('Y', strtotime($transactiondata -> Date)); ?>" style="padding-right:3em">View Ledger Information
                            </a>
                        </td>
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
