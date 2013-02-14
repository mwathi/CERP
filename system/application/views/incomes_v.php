<style>
	.reporttable td {
		border-bottom: 1px solid #000000;
	}
	.reporttable td+ td {
		border-bottom: 1px solid #000000;
		border-left: 0px;
	}
</style>
<div id="view_content">
    <div align="center">
        <table class="reporttable">
            <tr class="yellow">
                <th>Income Statement Information For the Month Ended <?php
                foreach ($transactiondates as $transactiondata) {echo date('F Y', strtotime($transactiondata -> Date));
                }
            ?></th>
            </tr>
                    <?php
                    foreach($offerings as $offer){?>
                        <tr>                                                                        
                            <th>Sales and Offerings</th>
                            <td></td>
                            <td id="sales"><?php echo $offer -> Offertory; ?></td>
                        </tr>
                        <?php
                        }
                    ?>
                    <tr>
                        <th>Less: Expenses</th>
                        <?php
                        foreach ($expenses as $expense) {
                            echo "<tr><td class='expense'>" . $expense -> Account . "</td><td></td><td>" . $expense -> Expense . "</tr>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <th>Total Expenses</th>
                        <td></td>
                       
                            <?php
                                foreach ($expenseTotal as $totalExpense) {
                                    echo "-<td id='totalexpenses'><b>".$totalExpense -> Total . "</b></td>";
                                }
                            ?>
                            
                    </tr>
                    <tr>
                        <td>Net Income</td>
                        <td></td>
                        <td id="net"></td>
                    </tr>
        </table>      
    </div>
</div>

<script>
    $(function(){
       document.getElementById('net').innerText = document.getElementById('sales').innerText - document.getElementById('totalexpenses').innerText;  
    });
</script>