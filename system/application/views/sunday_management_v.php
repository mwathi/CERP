<div id="view_content">      
    <div align="center">
        <table class="reporttable">
            <tr class="yellow"><th>Tithees and Offerings as Collected on <?php echo date('F Y l d', strtotime($sunday -> Date)); ?> </th></tr>
	<tr>
	<th>Amounts</th>	
	<th>1000</th>
	<th>500</th>
	<th>200</th>
	<th>100</th>
	<th>50</th>
	<th>20</th>
	<th>10</th>
	<th>5</th>
	<th>1</th>
	</tr>
	
	<tr>
		<td>Youth Service</td>
		<td id="ys1000" class="youth"><?php echo "". $sunday -> Thousand_Youth ; ?></td>
		<td id="ys500" class="youth"><?php echo "". $sunday -> Five_Hundred_Youth ; ?></td>
        <td id="ys200" class="youth"><?php echo "". $sunday -> Two_Hundred_Youth ; ?></td>
        <td id="ys100" class="youth"><?php echo "". $sunday -> Hundred_Youth ; ?></td>
        <td id="ys50" class="youth"><?php echo "". $sunday -> Fifty_Youth ; ?></td>
        <td id="ys20" class="youth"><?php echo "". $sunday -> Twenty_Youth ; ?></td>
        <td id="ys10" class="youth"><?php echo "". $sunday -> Ten_Youth ; ?></td>
        <td id="ys5" class="youth"><?php echo "". $sunday -> Five_Youth ; ?></td>
        <td id="ys1" class="youth"><?php echo "". $sunday -> One_Youth ; ?></td>
        <td id="totalyouth"></td>
	</tr>
	<tr>
		<td>Teen Service</td>
        <td class="teen"><?php echo "". $sunday -> Thousand_Teens ; ?></td>
        <td class="teen"><?php echo "". $sunday -> Five_Hundred_Teens ; ?></td>
        <td class="teen"><?php echo "". $sunday -> Two_Hundred_Teens ; ?></td>
        <td class="teen"><?php echo "". $sunday -> Hundred_Teens ; ?></td>
        <td class="teen"><?php echo "". $sunday -> Fifty_Teens ; ?></td>
        <td class="teen"><?php echo "". $sunday -> Twenty_Teens ; ?></td>
        <td class="teen"><?php echo "". $sunday -> Ten_Teens ; ?></td>
        <td class="teen"><?php echo "". $sunday -> Five_Teens ; ?></td>
        <td class="teen"><?php echo "". $sunday -> One_Teens ; ?></td>
        <td id="totalteen"></td>
	</tr>
	<tr>	
		<td>Sunday School Service</td>
		<td class="sundayschool"><?php echo "". $sunday -> Thousand_Sunday_School ; ?></td>
        <td class="sundayschool"><?php echo "". $sunday -> Five_Hundred_Sunday_School ; ?></td>
        <td class="sundayschool"><?php echo "". $sunday -> Two_Hundred_Sunday_School ; ?></td>
        <td class="sundayschool"><?php echo "". $sunday -> Hundred_Sunday_School ; ?></td>
        <td class="sundayschool"><?php echo "". $sunday -> Fifty_Sunday_School ; ?></td>
        <td class="sundayschool"><?php echo "". $sunday -> Twenty_Sunday_School ; ?></td>
        <td class="sundayschool"><?php echo "". $sunday -> Ten_Sunday_School ; ?></td>
        <td class="sundayschool"><?php echo "". $sunday -> Five_Sunday_School ; ?></td>
        <td class="sundayschool"><?php echo "". $sunday -> One_Sunday_School ; ?></td>
        <td id="totalsundayschool"></td>
	</tr>
	<tr>	
		<td>English Service</td>
		<td class="english"><?php echo "". $sunday -> Thousand_English_Service ; ?></td>
        <td class="english"><?php echo "". $sunday -> Five_Hundred_English_Service ; ?></td>
        <td class="english"><?php echo "". $sunday -> Two_Hundred_English_Service ; ?></td>
        <td class="english"><?php echo "". $sunday -> Hundred_English_Service ; ?></td>
        <td class="english"><?php echo "". $sunday -> Fifty_English_Service ; ?></td>
        <td class="english"><?php echo "". $sunday -> Twenty_English_Service ; ?></td>
        <td class="english"><?php echo "". $sunday -> Ten_English_Service ; ?></td>
        <td class="english"><?php echo "". $sunday -> Five_English_Service ; ?></td>
        <td class="english"><?php echo "". $sunday -> One_English_Service ; ?></td>
        <td id="totalenglish"></td>
	</tr>
	<tr>	
		<td>Swahili Service</td>
        <td class="swahili"><?php echo "". $sunday -> Thousand_Swahili_Service ; ?></td>
        <td class="swahili"><?php echo "". $sunday -> Five_Hundred_Swahili_Service ; ?></td>
        <td class="swahili"><?php echo "". $sunday -> Two_Hundred_Swahili_Service ; ?></td>
        <td class="swahili"><?php echo "". $sunday -> Hundred_Swahili_Service ; ?></td>
        <td class="swahili"><?php echo "". $sunday -> Fifty_Swahili_Service ; ?></td>
        <td class="swahili"><?php echo "". $sunday -> Twenty_Swahili_Service ; ?></td>
        <td class="swahili"><?php echo "". $sunday -> Ten_Swahili_Service ; ?></td>
        <td class="swahili"><?php echo "". $sunday -> Five_Swahili_Service ; ?></td>
        <td class="swahili"><?php echo "". $sunday -> One_Swahili_Service ; ?></td>
        <td id="totalswahili"></td>
	</tr>
	<tr>	
		<td>Tithes</td>
        <td class="tithes"><?php echo "". $sunday -> Thousand_Tithe ; ?></td>
        <td class="tithes"><?php echo "". $sunday -> Five_Hundred_Tithe ; ?></td>
        <td class="tithes"><?php echo "". $sunday -> Two_Hundred_Tithe ; ?></td>
        <td class="tithes"><?php echo "". $sunday -> Hundred_Tithe ; ?></td>
        <td class="tithes"><?php echo "". $sunday -> Fifty_Tithe ; ?></td>
        <td class="tithes"><?php echo "". $sunday -> Twenty_Tithe ; ?></td>
        <td class="tithes"><?php echo "". $sunday -> Ten_Tithe ; ?></td>
        <td class="tithes"><?php echo "". $sunday -> Five_Tithe ; ?></td>
        <td class="tithes"><?php echo "". $sunday -> One_Tithe ; ?></td>
        <td id="totaltithes"></td>
	</tr>
	<tr>	
		<td>Thanksgiving</td>
        <td class="thanksgiving"><?php echo "". $sunday -> Thousand_Thanksgiving ; ?></td>
        <td class="thanksgiving"><?php echo "". $sunday -> Five_Hundred_Thanksgiving ; ?></td>
        <td class="thanksgiving"><?php echo "". $sunday -> Two_Hundred_Thanksgiving ; ?></td>
        <td class="thanksgiving"><?php echo "". $sunday -> Hundred_Thanksgiving ; ?></td>
        <td class="thanksgiving"><?php echo "". $sunday -> Fifty_Thanksgiving ; ?></td>
        <td class="thanksgiving"><?php echo "". $sunday -> Twenty_Thanksgiving ; ?></td>
        <td class="thanksgiving"><?php echo "". $sunday -> Ten_Thanksgiving ; ?></td>
        <td class="thanksgiving"><?php echo "". $sunday -> Five_Thanksgiving ; ?></td>
        <td class="thanksgiving"><?php echo "". $sunday -> One_Thanksgiving ; ?></td>
        <td id="totalthanksgiving"></td>
	</tr>
	<tr>	
		<td>Monthly Pledges</td>
		<td class="pledges"><?php echo "". $sunday -> Thousand_Monthly_Pledge ; ?></td>
        <td class="pledges"><?php echo "". $sunday -> Five_Hundred_Monthly_Pledge ; ?></td>
        <td class="pledges"><?php echo "". $sunday -> Two_Hundred_Monthly_Pledge ; ?></td>
        <td class="pledges"><?php echo "". $sunday -> Hundred_Monthly_Pledge ; ?></td>
        <td class="pledges"><?php echo "". $sunday -> Fifty_Monthly_Pledge ; ?></td>
        <td class="pledges"><?php echo "". $sunday -> Twenty_Monthly_Pledge ; ?></td>
        <td class="pledges"><?php echo "". $sunday -> Ten_Monthly_Pledge ; ?></td>
        <td class="pledges"><?php echo "". $sunday -> Five_Monthly_Pledge ; ?></td>
        <td class="pledges"><?php echo "". $sunday -> One_Monthly_Pledge ; ?></td>
        <td id="totalpledges"></td>
	</tr>
	<tr>
		<td>Cheques</td>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th id="totalcheques"><?php echo number_format($sunday -> Cheque_Amount)?></th>
	</tr>
	<tr>
		<th id="">Grand Total</th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th id="totalall"><?=number_format($totse->Offertory + $sunday -> Cheque_Amount)?></th>
	</tr>
	<tr height="40px"></tr>
</table>

</div></div>

<script>
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
	$(function(){
		var sum = 0;
		$(".youth").each(function(){
			sum += parseInt($(this).html())
		})
		$("#totalyouth").html("<b>" + sum + "</b>");
	})
	
	$(function(){
		var sum = 0;
		$(".pledges").each(function(){
			sum += parseInt($(this).html())
		})
		$("#totalpledges").html("<b>" + numberWithCommas(sum) + "</b>");
	})
	
	$(function(){
		var sum = 0;
		$(".english").each(function(){
			sum += parseInt($(this).html())
		})
		$("#totalenglish").html("<b>" + numberWithCommas(sum) + "</b>");
	})
	
	$(function(){
		var sum = 0;
		$(".swahili").each(function(){
			sum += parseInt($(this).html())
		})
		$("#totalswahili").html("<b>" + numberWithCommas(sum) + "</b>");
	})
	
	$(function(){
		var sum = 0;
		$(".sundayschool").each(function(){
			sum += parseInt($(this).html())
		})
		$("#totalsundayschool").html("<b>" + numberWithCommas(sum) + "</b>");
	})
	
	$(function(){
		var sum = 0;
		$(".tithes").each(function(){
			sum += parseInt($(this).html())
		})
		$("#totaltithes").html("<b>" + numberWithCommas(sum) + "</b>");
	})
	
	$(function(){
		var sum = 0;
		$(".thanksgiving").each(function(){
			sum += parseInt($(this).html())
		})
		$("#totalthanksgiving").html("<b>" + numberWithCommas(sum) + "</b>");
	})
	
	$(function(){
		var sum = 0;
		$(".teen").each(function(){
			sum += parseInt($(this).html())
		})
		$("#totalteen").html("<b>" + numberWithCommas(sum) + "</b>");
	})
</script>