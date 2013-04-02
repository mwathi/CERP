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
                <th>
                    <u>Income</u>
                </th>
            </tr>
            <tr height="20px"></tr>
            <tr>
                <th>Memo</th>
                <th>Date</th>
                <th>Debit</th>
                <th>Credit</th>
                <th>Balance</th>
            </tr>
            <?php
            $dave = 0;
            foreach ($incomeTotal as $transactiondata) {
                    echo "<tr>
              <td>" . $transactiondata -> transaction . "</td>
              <td>" . $transactiondata -> date . "</td>
              <td class=debit>0</td>
              <td class=credit>" . $transactiondata -> account_affected_1_amount . "</td>
              <td>" . $dave += $transactiondata -> account_affected_1_amount . "</td>
              </tr>";
            }
            ?>
            <tr>
                <th>Total</th>
                <th></th>
                <td id="totaldebits"></td>
                <td id="totalcredits"></td>
                <td id="balance"></td>
            </tr>
            
            <tr height="40px"></tr>
            <tr>
                <th>
                    <u>Expense</u>
                </th>
            </tr>
            <tr height="20px"></tr>
            <?php
            $dave = 0;
            foreach ($expenseTotal as $transactiondata) {
                    echo "<tr>
              <td>" . $transactiondata -> transaction . "</td>
              <td>" . $transactiondata -> date . "</td>
              <td class=expensedebit>" . $transactiondata -> account_affected_2_amount . "</td>
              <td class=expensecredit>0</td>
              <td>" . $dave += $transactiondata -> account_affected_2_amount . "</td>
              </tr>";
            }
            ?>
            <tr>
                <th>Total</th>
                <th></th>
                <td id="expensetotaldebits"></td>
                <td id="expensetotalcredits"></td>
                <td id="expensebalance"></td>
            </tr>
            
            <tr>
                <th>Net Ordinary Income</th>
                <th></th>
                <td id="netdebit"></td>
                <td id="netcredit"></td>
                <td id="netbalance"></td>
            </tr>
        </table>
    </div>
</div>

<script>
    $(function(){
      var debitcolumn = $('.debit')
      var sum = 0
      $.each(debitcolumn,function(){
          sum += parseInt($(this).html())
      })  
      $('#totaldebits').html("<b>" + sum + "</b>");
    })
    
    $(function(){
      var creditcolumn = $('.credit')
      var sum = 0
      $.each(creditcolumn,function(){
          sum += parseInt($(this).html())
      })  
      $('#totalcredits').html("<b>" + sum + "</b>");
      $('#balance').html( parseInt( $('#totalcredits').text()) );
      $('#balance').css("font-weight","bold")  
    })
    
    $(function(){
      var debitcolumn = $('.expensedebit')
      var sum = 0
      $.each(debitcolumn,function(){
          sum += parseInt($(this).html())
      })  
      $('#expensetotaldebits').html("<b>" + sum + "</b>");
    })
    
    $(function(){
      var creditcolumn = $('.expensecredit')
      var sum = 0
      $.each(creditcolumn,function(){
          sum += parseInt($(this).html())
      })  
      $('#expensetotalcredits').html("<b>" + sum + "</b>");
      $('#expensebalance').html( parseInt( $('#expensetotaldebits').text()) );
      $('#netdebit').html( parseInt( $('#expensetotaldebits').text()) );
      $('#netcredit').html( parseInt( $('#totalcredits').text()) );
      $('#netbalance').html( parseInt( $('#netcredit').text()) - parseInt( $('#netdebit').text()) );
      $('#expensebalance').css("font-weight","bold")
      $('#netdebit').css("font-weight","bold")
      $('#netcredit').css("font-weight","bold")
      $('#netbalance').css("font-weight","bold")  
    })
    
</script>