<div id="view_content">
    <div align="center">
        <table class="reporttable">
            <tr class="yellow">
                <th>Balance Sheet Information By Date</th>
            </tr>
                    <?php
                    foreach($transactiondates as $transactiondata){?>
                        <tr>                                                                        
                        <td><?php echo date('F Y', strtotime($transactiondata -> Date )); ?></td>
                        <td>
                            <a href="<?php echo base_url()."journal_entries/balancesheets/".$bankaccounts -> Bank_Accounts; ?>" style="padding-right:3em">View Balance Sheet Information
                            </a>
                        </td>
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
