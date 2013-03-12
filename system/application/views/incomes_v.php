<style>
	.reporttable td {
		border-bottom: 1px solid #000000;
	}
	.reporttable td+ td {
		border-bottom: 1px solid #000000;
		border-left: 0px;
	}
	.hide {

		visibility: hidden
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
                            <td><?php echo number_format($offer -> Offertory); ?></td>
                            <input type="hidden" value="<?=$offer -> Offertory ?>" id="sales" />
                        </tr>
                        <?php
                        }
                    ?>
   
                        <tr>                                                                        
                            <th>Contributions</th>
                            <td></td>
                            <td id="contributions" class=""><? echo $contributions -> Sunday_Contributions ?></td>
                        </tr>
          
                    <tr height="20px"></tr>
                    <tr>
                        <th>Less: Expenses</th>
                        <?php
                        foreach ($expenses as $expense) {
                            echo "<tr><td class='expense'>" . $expense -> Account . "</td><td></td><td>" . number_format($expense -> Expense) . "</tr>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <th>Total Expenses</th>
                        <td></td>
                       
                            <?php
                                foreach ($expenseTotal as $totalExpense) {?>
                                    <td><? echo "<b>(" . number_format($totalExpense -> Total) . ")</b>"; ?>
                                    </td><input id="totalexpenses" type="hidden" value="<?=$totalExpense -> Total ?>" />
                                    <?php } ?>
                            
                    </tr>
                    <tr>
                        <td>NET INCOME</td>
                        <td></td>
                        <td id="net"></td>
                    </tr>
        </table>      
    </div>
</div>

<script>
	if (document.getElementById('contributions').innerText == '' && (document.getElementById('totalexpenses').value == '' || document.getElementById('totalexpenses').value == 0)) {
		document.getElementById('net').innerText = parseInt(document.getElementById('sales').value);
	} else {
		document.getElementById('net').innerText = (parseInt(document.getElementById('sales').value) + parseInt(document.getElementById('contributions').innerText)) - parseInt(document.getElementById('totalexpenses').value);
	}
</script>