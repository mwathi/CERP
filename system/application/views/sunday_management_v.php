<div id="view_content">      
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow"><th>Tithees and Offerings as Collected on <?php echo date('F Y l d', strtotime($sunday -> Date)); ?> </th></tr>
           <tr></tr>
           <tr style="height: 30px"></tr>
          
           <tr>
               <td>Youth Service</td><td id="ys" style="text-align: right"><?php echo $sunday -> Youth_Service; ?></td>
           </tr>
           <tr>
               <td>Teens</td><td id="teen" style="text-align: right"><?php echo $sunday -> Teens; ?></td>
           </tr>
           <tr>               
               <td>Sunday School</td><td id="ss" style="text-align: right"><?php echo $sunday -> Sunday_School; ?></td>
           </tr>
           <tr>
               <td>English Service</td><td id="es" style="text-align: right"><?php echo $sunday -> English_Service; ?></td>
           </tr>
               <tr>
               <td>Swahili Service</td><td  id="sws" style="text-align: right"><?php echo $sunday -> Swahili_Service; ?></td>
           </tr>
           <tr>
               <td>Monthly Pledge</td><td id="mlp" style="text-align: right"><?php echo $sunday -> Monthly_Pledge; ?></td>
           </tr>
           <tr>
              <td>Thanksgiving</td><td id="thnk" style="text-align: right"><?php echo $sunday -> Thanksgiving; ?></td>
           </tr>
           <tr>
               <td >Tithe</td><td id="tith" style="text-align: right"><?php echo $sunday -> Tithe; ?></td>
           </tr>
           <tr style="height: 30px"></tr>
           <!--Work Details-->
           <tr>
               <th>Total Sunday Monies: </th><th id="monies"></th>
           </tr>
        </table>      
    </div>
</div>


<script>
$(function(){
    var tith = parseInt(document.getElementById("tith").innerText);
    var ys = parseInt(document.getElementById("ys").innerText);
    var teen = parseInt(document.getElementById("teen").innerText);
    var ss = parseInt(document.getElementById("ss").innerText);
    var es = parseInt(document.getElementById("es").innerText);
    var swa = parseInt(document.getElementById("sws").innerText);
    var thnk = parseInt(document.getElementById("thnk").innerText);
    var mlp = parseInt(document.getElementById("mlp").innerText);
    
    var total = (mlp + thnk + swa + es + ss + teen + ys + tith);
    document.getElementById("monies").innerText = total;
    
});
</script>