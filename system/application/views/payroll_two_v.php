<div id="view_content">
    <div align="center">
        <table class="reporttable">
            <tr class="yellow">
                <th>Pay Period</th>
                <th>Employees Paid</th>         
            </tr>
                    <?php
                    foreach($payperioddata as $payrolldata){?>
                        <tr>                                                                        
                        <td><?php echo $payrolldata -> Employee -> Name ?></td>
                        <td><a href="<?php echo base_url()."payroll_management/payroll_three/".$payrolldata -> Employee_Number."/".$payrolldata -> Pay_Period; ?>">View More Information</a></td>      
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
