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
                <th>Transaction Date</th>
            </tr>
                    <?php
                    foreach($transactiondates as $transactiondata){?>
                        <tr>                                                                        
                        <td><?php echo date('F Y', strtotime($transactiondata -> Date )); ?></td>
                        <td><a href="<?php echo base_url()."journal_entries/monthlyJournal/".date('n', strtotime($transactiondata -> Date)); ?>">View Journal Information For <?php echo date('F', strtotime($transactiondata -> Date )); ?></a></td>
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
