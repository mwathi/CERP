<style>
	.reporttable td {
		border-bottom: 1px solid #000000;
	}
	.reporttable td+ td {
		border-bottom: 1px solid #000000;
		border-left: 0px;
		text-align: right
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
                            <input type="hidden" value="<?php if($offer -> Offertory != 0 || $offer -> Offertory != ""){echo $offer -> Offertory; }else{echo "0" ;} ?>" id="sales" />
                        </tr>
                        <?php
                        }
                    ?>
                    <input type="hidden" id="totalincomes" />
                        <tr>                                                                        
                            <th>Contributions</th>
                            <td></td>
                            <td id="" class="">
                            	<?php
                            	 echo number_format($contributions -> Sunday_Contributions) ?></td>
                            	 <input type="hidden" id="contributions" value="<?php if($contributions -> Sunday_Contributions != "" || $contributions -> Sunday_Contributions != 0){
                            	 echo $contributions -> Sunday_Contributions; }else{echo "0";} ?>"/>
                        </tr>
                        <tr>
                        	<th>Total Incomes</th>
                        	<td></td>
                        	<td id="totalincomerealised"></td>
                        </tr>
                    <tr height="20px"></tr>
                    <tr>
                        <th>Less: Expenses</th>
                        <?php
                        foreach ($expenses as $expense) {
                            echo "<tr><td class='expense' id=expense>" . $expense -> Account . "</td><td></td><td>" . number_format($expense -> Expense). "</tr>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <th>Total Expenses</th>
                        <td></td>
                       
                            <?php
                                foreach ($expenseTotal as $totalExpense) {?>
                                    <td><?php echo "<b>(" . number_format($totalExpense -> Total) . ")</b>"; ?>
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
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

$(function(){
	var totalincomerealised = parseInt($("#sales").val()) + parseInt($("#contributions").val());
	$("#totalincomerealised").html(numberWithCommas(totalincomerealised));
	$("#totalincomerealised").css('font-weight','bold');
	
	var net = totalincomerealised - parseInt($("#totalexpenses").val());
	$("#net").html(numberWithCommas(net));
	
	$("#net").css('font-weight','bold');
})	


</script>