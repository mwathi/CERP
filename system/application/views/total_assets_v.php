<script>
$(document).ready(function(){
        var sum = 0;
        var column2 = $('.debit')
        jQuery.each(column2,function(number){
            sum += parseInt($(this).html());
        });
        $('#totaldebit').html("<b>" + sum + "</b>");

})
$(document).ready(function(){
        var sum = 0;
        var column2 = $('.credit')
        jQuery.each(column2,function(number){
            sum += parseInt($(this).html());
        });
        $('#totalcredit').html("<b>" + sum + "</b>");
})

</script>
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

            foreach ($transaction as $transactiondata) {
                if ($transactiondata -> transaction == "Opening Balance" || $transactiondata -> account_affected_2 == "Offerings" || $transactiondata -> account_affected_2 == "Pledges") {
                    echo "<tr>
              <td>" . $transactiondata -> transaction . "</td>
              <td>" . $transactiondata -> date . "</td>
              <td class=debit>" . $transactiondata -> account_affected_1_amount . "</td>
              <td class=credit>0</td>
              <td class=balance>" . $transactiondata -> ending_balance . "</td>
              </tr>";
                } else {
                    echo "<tr>
              <td>" . $transactiondata -> transaction . "</td>
              <td>" . $transactiondata -> date . "</td>
              <td class=debit>0</td>
              <td class=credit>" . $transactiondata -> account_affected_1_amount . "</td>
              <td class=balance>" . $transactiondata -> ending_balance . "</td>
              </tr>";
                }
            }
            ?>
            <tr height="30px">
            </tr>
            <tr>
                <td style="border-bottom: 0;"><b>Total</b></td><td style="border-bottom: 0"></td><td id="totaldebit" style="border-top: 1px solid #000; padding: 1px">
                </td>
                <td id="totalcredit" style="border-top: 1px solid #000; padding: 1px"></td>
                <td id="totalbalance" style="border-top: 1px solid #000; padding: 1px"></td>
            </tr>
            <tr height="30px">
            </tr>
            <?php
            $dave = 0;
            foreach ($transaction2 as $transactiondata2) {
                    echo "<tr>
              <td>" . $transactiondata2 -> transaction . "</td>
              <td>" . $transactiondata2 -> date . "</td>
              <td class=otherdebits>" . $transactiondata2 -> account_affected_1_amount . "</td>
              <td></td>
              <td>" . $dave += $transactiondata2 -> account_affected_1_amount . "</td>
              </tr>";
            }
            ?>
        </table>
    </div>
</div>


<script>
    $(function(){
        document.getElementById("totalbalance").innerText = parseInt(document.getElementById("totaldebit").innerText) - parseInt(document.getElementById("totalcredit").innerText);
        $("#totalbalance").css("font-weight","bold");
         
    })
</script>