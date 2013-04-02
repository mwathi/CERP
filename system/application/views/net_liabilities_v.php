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
			<tr>
				<th>Accounts Payable</th>
			</tr>
			<tr>
				<th>Memo</th>
				<th>Date</th>
				<th>Debit</th>
				<th>Credit</th>
				<th>Balance</th>
			</tr>
			<?php
            $dave = 0;
            foreach ($transaction as $transactiondata) {
                echo "<tr>
              <td>" . $transactiondata -> Transaction . "</td>
              <td>" . $transactiondata -> Date . "</td>";
                if ($transactiondata -> Account_Affected_1 == "Accounts Payable") {
                    echo "<td class=debit>" . $transactiondata -> Account_Affected_1_Amount . "</td>
                        <td class=credit>0</td>";
                } else {
                    echo "<td class=debit>0</td><td class=credit>" . $transactiondata -> Account_Affected_1_Amount . "</td>";
                }
                if ($transactiondata -> Account_Affected_1 == "Utilities Expense") {
                    echo "<td>" . $dave += $transactiondata -> Account_Affected_1_Amount . "</td>";
                } else {
                    echo "<td>" . $dave -= $transactiondata -> Account_Affected_1_Amount . "</td>";
                }
                echo "</tr>";
            }
			?>
			<tr>
				<th>Total Accounts Payable</th>
				<th></th>
				<td id="totaldebits"></td>
				<td id="totalcredits"></td>
				<td id="balance"></td>
			</tr>

			<tr height="40px"></tr>
			<tr>
				<th>Opening Balance Equity</th>
			</tr>

			<!-----------OPENING BALANCE
			----------------------->
			<?php
            $dave = 0;
            foreach ($transaction2 as $transactiondata) {
                echo "<tr>
<td>Account Opening</td>
<td>" . $transactiondata -> Opening_Balance_Date . "</td>
<td class=opdebit>0</td>
<td class=opcredit>" . $transactiondata -> Opening_Balance . "</td>
<td>" . $dave += $transactiondata -> Opening_Balance . "</td>
</tr>";
            }
			?>
			<tr>
				<th>Total Opening Equity</th>
				<th></th>
				<td id="optotaldebits"></td>
				<td id="optotalcredits"></td>
				<td id="opbalance"></td>
			</tr>

			<tr height="40px"></tr>
			<tr>
				<th>Income</th>
			</tr>
			<!----------------INCOMES------------->
			<?php
            $dave = 0;
            foreach ($incomeTotal as $transactiondata) {
                echo "<tr>
<td>" . $transactiondata -> transaction . "</td>
<td>" . $transactiondata -> date . "</td>
<td class=incdebit>0</td>
<td class=inccredit>" . $transactiondata -> account_affected_1_amount . "</td>
<td>" . $dave += $transactiondata -> account_affected_1_amount . "</td>
</tr>";
            }
			?>
			<tr>
				<th>Total Incomes</th>
				<th></th>
				<td id="inctotaldebits"></td>
				<td id="inctotalcredits"></td>
				<td id="incbalance"></td>
			</tr>

			<tr height="40px"></tr>

			<tr>
				<th> Expense </th>
			</tr>
			<?php
            $dave = 0;
            foreach ($expenseTotal as $transactiondata) {
                echo "<tr>
<td>" . $transactiondata -> transaction . "</td>
<td>" . $transactiondata -> date . "</td>
<td class=expensedebit>" .  $transactiondata -> account_affected_2_amount . "</td>
<td class=expensecredit>0</td>
<td>" . -$dave += $transactiondata -> account_affected_2_amount . "</td>
</tr>";
            }
			?>
			<tr>
				<th>Total Expenses</th>
				<th></th>
				<td id="expensetotaldebits"></td>
				<td id="expensetotalcredits"></td>
				<td id="expensebalance"></td>
			</tr>
			
			<tr height="30px"></tr>

			<tr>
				<th>TOTAL</th>
				<th></th>
				<td id="nettotaldebits"></td>
				<td id="nettotalcredits"></td>
				<td id="netbalances"></td>
			</tr>

		</table>
	</div>
</div>

<script>
	$(function() {
		var debitcolumn = $('.debit')
		var sum = 0
		$.each(debitcolumn, function() {
			sum += parseInt($(this).html())
		})
		$('#totaldebits').html("<b>" + sum + "</b>");
	})
	$(function() {
		var creditcolumn = $('.credit')
		var sum = 0
		$.each(creditcolumn, function() {
			sum += parseInt($(this).html())
		})
		$('#totalcredits').html("<b>" + sum + "</b>");
		$('#balance').html(parseInt($('#totalcredits').text()) - parseInt($('#totaldebits').text()));
		$('#balance').css("font-weight", "bold")
	})
	/*
	 OPEING BALANCE
	 * */
	$(function() {
		var debitcolumn = $('.opdebit')
		var sum = 0
		$.each(debitcolumn, function() {
			sum += parseInt($(this).html())
		})
		$('#optotaldebits').html("<b>" + sum + "</b>");
	})
	$(function() {
		var creditcolumn = $('.opcredit')
		var sum = 0
		$.each(creditcolumn, function() {
			sum += parseInt($(this).html())
		})
		$('#optotalcredits').html("<b>" + sum + "</b>");
		$('#opbalance').html(parseInt($('#optotalcredits').text()));
		$('#opbalance').css("font-weight", "bold")
	})
	/*INCOMES*/

	$(function() {
		var debitcolumn = $('.incdebit')
		var sum = 0
		$.each(debitcolumn, function() {
			sum += parseInt($(this).html())
		})
		$('#inctotaldebits').html("<b>" + sum + "</b>");
	})
	$(function() {
		var creditcolumn = $('.inccredit')
		var sum = 0
		$.each(creditcolumn, function() {
			sum += parseInt($(this).html())
		})
		$('#inctotalcredits').html("<b>" + sum + "</b>");
		$('#incbalance').html(parseInt($('#inctotalcredits').text()));
		$('#incbalance').css("font-weight", "bold")
	})
	/*EPENSES*/
	$(function() {
		var debitcolumn = $('.expensedebit')
		var sum = 0
		$.each(debitcolumn, function() {
			sum += parseInt($(this).html())
		})
		$('#expensetotaldebits').html("<b>" + sum + "</b>");
	})
	$(function() {
		var creditcolumn = $('.expensecredit')
		var sum = 0
		$.each(creditcolumn, function() {
			sum += parseInt($(this).html())
		})
		$('#expensetotalcredits').html("<b>" + sum + "</b>");
		$('#expensebalance').html(-parseInt($('#expensetotaldebits').text()));
		$('#expensebalance').css("font-weight", "bold")
	})
	
	
    $(function(){
        $('#nettotaldebits').html(
            parseInt($('#totaldebits').text()) +
            parseInt($('#inctotaldebits').text()) + 
            parseInt($('#optotaldebits').text()) +
            parseInt($('#expensetotaldebits').text())
        );
        $('#nettotaldebits').css("font-weight", "bold")
        
        $('#nettotalcredits').html(
            parseInt($('#totalcredits').text()) +
            parseInt($('#inctotalcredits').text()) + 
            parseInt($('#optotalcredits').text()) +
            parseInt($('#expensetotalcredits').text())
        );
        $('#nettotalcredits').css("font-weight", "bold")
        
        $('#netbalances').html(
            parseInt($('#balance').text()) +
            parseInt($('#incbalance').text()) + 
            parseInt($('#opbalance').text()) +
            parseInt($('#expensebalance').text())
        );
        $('#netbalances').css("font-weight", "bold")
    })

</script>