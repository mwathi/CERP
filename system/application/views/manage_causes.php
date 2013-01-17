<div id="view_content">
    <br />
	<a class="action_button" id="new_pledge" href="<?php echo site_url("pledge_controller/add"); ?>">New Cause</a>
	<div align="center">
		<?php echo validation_errors('<p class="error">', '</p>'); ?>
		<table class="reporttable">
        <!--td><input type="hidden" value="<?php foreach($causename as $causename)echo $causename -> id; ?>" name="causeid" /></td-->
			<tr class="yellow">
				<th>Contributors</th>
				<th>Amount Pledged</th>
				<th>Amount Paid</th>
				<th>Balance</th>
			</tr>
			
			<?php

            foreach($contributions as $contribution){
            ?>
            <tr>
                <td><a href="<?php echo base_url()."pledge_controller/member_contribution_details/".$contribution ->Member_Number."/".$contribution->Cause ?>"><?php echo $contribution -> Name; ?></a></td>
                <td><?php echo $contribution -> Pledge; ?></td>
                <td><?php echo $contribution -> Contribution_Made; ?></td>
                <td><?php if($contribution -> Contribution_Made > $contribution -> Pledge){ echo "<label style='color:purple'> +".($contribution -> Contribution_Made - $contribution -> Pledge)."</label>"; }
                else echo "<label style='color:red'> (".($contribution -> Pledge - $contribution -> Contribution_Made).")</label>"; ?></td>
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
                    echo "<td style='color:purple' ><input readonly id='total' style= 'text-align: center;border: 0; color:purple' type=text value=".$totse->Total."></td>";
                }
				foreach ($causedata as $causetarget) {
                    echo "<td style='color:red' ><input readonly id='target' style= 'text-align: center;border: 0; color:oilve' type=text value=".$causetarget->Target."></td>";
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