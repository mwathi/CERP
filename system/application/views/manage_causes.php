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
				<td><?php echo $contriboot -> Small_Pledge + $contriboot -> Medium_Pledge + $contriboot -> Great_Pledge + $contriboot -> Major_Pledge; ?></td>

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
                    echo "<td style='color:purple' id='total'>" .$totse -> Total. "</td>";
                }
				foreach ($causedata as $causetarget) {
                    echo "<td style='color:red' id='target'>" .$causetarget -> Target. "</td>";
                }
                ?>
			</tr>
			<tr style="height: 20px">
			<tr>
                <td>Deficit</td>
                <td>Surplus</td>
            </tr>
            <tr>
                <td id="showdeficit"></td>
                <td id="showsurplus"></td>
            </tr>
            
            
		</table>
	</div>
</div>

<script>
    var total = document.getElementById ( "total" ).innerText;
    var target = document.getElementById ( "target" ).innerText;
    if (target > total){
        var deficit = target - total;
        document.getElementById("showdeficit").innerHTML = deficit;
    }else if (total > target){
        var surplus = total - target;
        document.getElementById("showsurplus").innerHTML = surplus;
    } 
</script>