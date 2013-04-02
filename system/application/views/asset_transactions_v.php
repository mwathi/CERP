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
              <td>" . $transactiondata -> transaction . "</td>
              <td>" . $transactiondata -> date . "</td>
              <td class=debit>" . $transactiondata -> account_affected_1_amount . "</td>
              <td class=credit>0</td>
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
      $('#balance').html( parseInt($('#totaldebits').text()) - parseInt( $('#totalcredits').text()) );
      $('#balance').css("font-weight","bold")  
    })
    
</script>