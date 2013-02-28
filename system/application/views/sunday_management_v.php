<div id="view_content">      
    <div align="center">
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <table class="reporttable">
            <tr class="yellow"><th>Tithees and Offerings as Collected on <?php echo date('F Y l d', strtotime($sunday -> Date)); ?> </th></tr>
           <tr></tr>
          
           <tr>
               <td>Youth Service</td><td id="ys" style="text-align: right">
                   <table>
                       <tr>
                           <td id="ys1000"><?php echo "1000 x ". $sunday -> Thousand_Youth / 1000; ?></td>
                       </tr>
                       <tr>
                           <td id="ys500"><?php echo "500 x ". $sunday -> Five_Hundred_Youth / 500; ?></td>
                       </tr>
                       <tr>
                           <td id="ys200"><?php echo "200 x ". $sunday -> Two_Hundred_Youth / 200; ?></td>
                       </tr>
                       <tr>
                           <td id="ys100"><?php echo "100 x ". $sunday -> Hundred_Youth / 100; ?></td>
                       </tr>
                       <tr>
                           <td id="ys50"><?php echo "50 x ". $sunday -> Fifty_Youth / 50; ?></td>
                       </tr>
                       <tr>
                           <td id="ys20"><?php echo "20 x ". $sunday -> Twenty_Youth / 20; ?></td>
                       </tr>
                       <tr>
                           <td id="ys10"><?php echo "10 x ". $sunday -> Ten_Youth / 10; ?></td>
                       </tr>
                       <tr>
                           <td id="ys5"><?php echo "5 x ". $sunday -> Five_Youth / 5; ?></td>
                       </tr>
                       <tr>
                           <td id="ys1"><?php echo "1 x ". $sunday -> One_Youth / 1; ?></td>
                       </tr>
                   </table>
               </td>
           </tr>
           
                      <tr>
               <td>Teen Service</td><td id="ys" style="text-align: right">
                   <table>
                       <tr>
                           <td><?php echo "1000 x ". $sunday -> Thousand_Teens / 1000; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "500 x ". $sunday -> Five_Hundred_Teens / 500; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "200 x ". $sunday -> Two_Hundred_Teens / 200; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "100 x ". $sunday -> Hundred_Teens / 100; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "50 x ". $sunday -> Fifty_Teens / 50; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "20 x ". $sunday -> Twenty_Teens / 20; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "10 x ". $sunday -> Ten_Teens / 10; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "5 x ". $sunday -> Five_Teens / 5; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "1 x ". $sunday -> One_Teens / 1; ?></td>
                       </tr>
                   </table>
               </td>
           </tr>
           
                      <tr>
               <td>Sunday School Service</td><td id="ys" style="text-align: right">
                   <table>
                       <tr>
                           <td><?php echo "1000 x ". $sunday -> Thousand_Sunday_School / 1000; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "500 x ". $sunday -> Five_Hundred_Sunday_School / 500; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "200 x ". $sunday -> Two_Hundred_Sunday_School / 200; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "100 x ". $sunday -> Hundred_Sunday_School / 100; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "50 x ". $sunday -> Fifty_Sunday_School / 50; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "20 x ". $sunday -> Twenty_Sunday_School / 20; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "10 x ". $sunday -> Ten_Sunday_School / 10; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "5 x ". $sunday -> Five_Sunday_School / 5; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "1 x ". $sunday -> One_Sunday_School / 1; ?></td>
                       </tr>
                   </table>
               </td>
           </tr>
           
                      <tr>
               <td>English Service</td><td id="ys" style="text-align: right">
                   <table>
                       <tr>
                           <td><?php echo "1000 x ". $sunday -> Thousand_English_Service / 1000; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "500 x ". $sunday -> Five_Hundred_English_Service / 500; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "200 x ". $sunday -> Two_Hundred_English_Service / 200; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "100 x ". $sunday -> Hundred_English_Service / 100; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "50 x ". $sunday -> Fifty_English_Service / 50; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "20 x ". $sunday -> Twenty_English_Service / 20; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "10 x ". $sunday -> Ten_English_Service / 10; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "5 x ". $sunday -> Five_English_Service / 5; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "1 x ". $sunday -> One_English_Service / 1; ?></td>
                       </tr>
                   </table>
               </td>
           </tr>
           
                      <tr>
               <td>Swahili Service</td><td id="ys" style="text-align: right">
                   <table>
                       <tr>
                           <td><?php echo "1000 x ". $sunday -> Thousand_Swahili_Service / 1000; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "500 x ". $sunday -> Five_Hundred_Swahili_Service / 500; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "200 x ". $sunday -> Two_Hundred_Swahili_Service / 200; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "100 x ". $sunday -> Hundred_Swahili_Service / 100; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "50 x ". $sunday -> Fifty_Swahili_Service / 50; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "20 x ". $sunday -> Twenty_Swahili_Service / 20; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "10 x ". $sunday -> Ten_Swahili_Service / 10; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "5 x ". $sunday -> Five_Swahili_Service / 5; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "1 x ". $sunday -> One_Swahili_Service / 1; ?></td>
                       </tr>
                   </table>
               </td>
           </tr>
           
                      <tr>
               <td>Monthly Pledge</td><td id="ys" style="text-align: right">
                   <table>
                       <tr>
                           <td><?php echo "1000 x ". $sunday -> Thousand_Monthly_Pledge / 1000; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "500 x ". $sunday -> Five_Hundred_Monthly_Pledge / 500; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "200 x ". $sunday -> Two_Hundred_Monthly_Pledge / 200; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "100 x ". $sunday -> Hundred_Monthly_Pledge / 100; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "50 x ". $sunday -> Fifty_Monthly_Pledge / 50; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "20 x ". $sunday -> Twenty_Monthly_Pledge / 20; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "10 x ". $sunday -> Ten_Monthly_Pledge / 10; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "5 x ". $sunday -> Five_Monthly_Pledge / 5; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "1 x ". $sunday -> One_Monthly_Pledge / 1; ?></td>
                       </tr>
                   </table>
               </td>
           </tr>
           
                      <tr>
               <td>Thanksgiving</td><td id="ys" style="text-align: right">
                   <table>
                       <tr>
                           <td><?php echo "1000 x ". $sunday -> Thousand_Thanksgiving / 1000; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "500 x ". $sunday -> Five_Hundred_Thanksgiving / 500; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "200 x ". $sunday -> Two_Hundred_Thanksgiving / 200; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "100 x ". $sunday -> Hundred_Thanksgiving / 100; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "50 x ". $sunday -> Fifty_Thanksgiving / 50; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "20 x ". $sunday -> Twenty_Thanksgiving / 20; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "10 x ". $sunday -> Ten_Thanksgiving / 10; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "5 x ". $sunday -> Five_Thanksgiving / 5; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "1 x ". $sunday -> One_Thanksgiving / 1; ?></td>
                       </tr>
                   </table>
               </td>
           </tr>
           
                      <tr>
               <td>Tithe</td><td id="ys" style="text-align: right">
                   <table>
                       <tr>
                           <td><?php echo "1000 x ". $sunday -> Thousand_Tithe / 1000; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "500 x ". $sunday -> Five_Hundred_Tithe / 500; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "200 x ". $sunday -> Two_Hundred_Tithe / 200; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "100 x ". $sunday -> Hundred_Tithe / 100; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "50 x ". $sunday -> Fifty_Tithe / 50; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "20 x ". $sunday -> Twenty_Tithe / 20; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "10 x ". $sunday -> Ten_Tithe / 10; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "5 x ". $sunday -> Five_Tithe / 5; ?></td>
                       </tr>
                       <tr>
                           <td><?php echo "1 x ". $sunday -> One_Tithe / 1; ?></td>
                       </tr>
                   </table>
               </td>
           </tr>

           <tr style="height: 30px"></tr>
           <!--Work Details-->
           <tr>
               <th>Total Sunday Monies: </th><th id="monies"><?php echo $totse -> Offertory; ?></th>
           </tr>
        </table>      
    </div>
</div>
