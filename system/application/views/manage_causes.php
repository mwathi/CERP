<div id="view_content">
	<a class="action_button" id="new_pledge" href="<?php echo site_url("pledge_controller/add"); ?>">New Cause</a>
	<div align="center">
		<?php echo validation_errors('<p class="error">', '</p>'); ?>
		<table class="reporttable">
			<tr class="yellow">
				<th>Contributors</th>
				<th>Amount Removed</th>
			</tr>
			<?php

            foreach($contribootions as $contriboot){
			?>
			<tr>
				<td><?php echo $contriboot -> Name; ?></td>
				<td><?php echo $contriboot -> Ple; ?></td>

			</tr>
			<?php
            }
			?>
            
            <tr style="height: 20px">
                
            </tr>
			<tr>
				<td>Total Contribution</td>
				<td>Amount Targeted</td>
			</tr>

			<tr>
			    <?php
                foreach ($totalcontribootions as $totse) {
                    echo "<td style='color:purple' ><input id='total' style= 'text-align: center;border: 0; color:purple' type=text value=".$totse->Total." readonly></td>";
                }
				foreach ($causedata as $causetarget) {
                    echo "<td style='color:red' ><input id='target' style= 'text-align: center;border: 0; color:oilve' type=text value=".$causetarget->Target." readonly></td>";
                }
                ?>
			</tr>
			<tr style="height: 20px">
			<tr>
                <td>Deficit/Surplus</td>
                
            </tr>
            <tr>
                <td id="showresult"></td>
                    
            </tr>
            
            
		</table>
	</div>
</div>

<script>
var val1 = parseInt(document.getElementById('total').value);
var val2 = parseInt(document.getElementById('target').value);

if(val1 > val2){
   document.getElementById('showresult').innerHTML = val1 - val2;
}else if(val2 > val1){
    document.getElementById('showresult').innerHTML = "(" + (val2 - val1) + ")";
    $('#showresult').css("color","red");
}
</script>