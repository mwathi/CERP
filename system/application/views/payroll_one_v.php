<div id="view_content">
    <div align="center">
        <table class="reporttable">
            <tr class="yellow">
                <th>Pay Period</th>
                <th>Employees Paid</th>         
            </tr>
                    <?php
                    foreach($allpayrolldata as $payrolldata){?>
                        <tr>                                                                        
                        <td><?php echo $payrolldata -> Pay_Period ?></td>
                        <td><?php echo $payrolldata -> Paid_Guys ."/".  $allemployees -> Employees?></td>
                        <td><a href="<?php echo base_url()."payroll_management/payroll_two/".$payrolldata -> Pay_Period ?>">View More Information</a></td>      
                        </tr>
                        <?php
                        }
                    ?>
        </table>      
    </div>
</div>
