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
              if($transactiondata -> Account_Affected_1 == "Accounts Payable"){
                  echo "<td class=debit>" . $transactiondata -> Account_Affected_1_Amount . "</td>
                        <td class=credit>0</td>";
              }else{
                  echo "<td class=debit>0</td><td class=credit>".$transactiondata -> Account_Affected_1_Amount . "</td>";
              }
              if($transactiondata -> Account_Affected_1 == "Utilities Expense"){
                  echo "<td>". $dave += $transactiondata -> Account_Affected_1_Amount ."</td>";
              }else{
                  echo "<td>". $dave -= $transactiondata -> Account_Affected_1_Amount ."</td>";
              }
              echo "</tr>";
            }
            ?>
            <tr>
                <th>Total</th>
                <th></th>
                <td id="totaldebits"></td>
                <td id="totalcredits"></td>
                <td id="balance"></td>
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
      $('#balance').html( parseInt($('#totalcredits').text()) - parseInt( $('#totaldebits').text()) );
      $('#balance').css("font-weight","bold")  
    })
    
</script>