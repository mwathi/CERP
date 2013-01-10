<div id="view_content">      
    <div align="center">        
        <table class="reporttable">
            <tr class="yellow"><th>Manage your Assets</th></tr>
           <tr>
               <th class="purpleelement">Asset: <?php echo "<u>" .$asset -> Name . "</u>"; ?></th>
               <th></th>
               <th></th>
               <th></th>
               <th class="purpleelement"><?php echo date('F Y d'); ?></th>               
           </tr>
           <tr></tr>
           <tr style="height: 30px"></tr>
           
           <!--Personal
               Information-->
           <tr>
               <th>Type</th>
               <th>Model</th>
               <th>Number of Assets</th>
               <th>Serial Number</th>
               <th>Location</th>
               <th>Value</th>
               <th>Date Purchased</th>
               <th>Description</th>
             
           </tr>
           <tr>
               <td><?php echo $asset -> Type; ?></td>
               <td><?php echo $asset -> Model; ?></td>
               <td><?php echo $asset -> Number_of_Assets; ?></td>
               <td><?php echo $asset -> Serial_Number; ?></td>
               <td><?php echo $asset -> Location; ?></td>
               <td id="book_value"><?php echo $asset -> Value; ?></td>
               <td><?php echo $asset -> Date_Purchased; ?></td>
               <td><?php echo $asset -> Description; ?></td>
           </tr>
           <tr style="height: 30px"></tr>
           <tr>
               <td style="border: 0">
                   <div class="holder" style="width: 150px; margin-left: 0">
                       <p>Asset Useful Life <input type="text" id="useful" value=""/></p>
                       <p>Asset Salvage Value <input type="text" id="salvage" value=""/></p>
                       <br>
                       <p><a class="button" style="padding: 5px" id="depreciation">Calculate Depreciation</a></p>                                              
                   </div>
               </td>
               <td style="border: 0"></td>
               
               <td style="border: 0" id="BEGINNINGBOOKVALUE">
                
               </td>
               </tr>
               <tr>
                      <table class="reporttable">
                       <tr>
                           <th>Beginning Book Value</th>
                           <th>Annual Depreciation</th>
                           <th>Accumulated Depreciation</th>
                           <th>End Year Book Value</th>
                       </tr>
                       <td id="bookvaluechildren">
                           <table id="bbvchildren">
                                                     
                            </table>
                       </td>
                       <td id="annualdepreciationchildren">
                           <table id="deprchildren">
                               
                           </table>
                       </td>
                       
                       <td id="accumulateddepreciationchildren">
                           <table id="accdeprchildren">
                               
                           </table>
                       </td>
                       
                        <td id="endyearbookvaluechildren">
                           <table id="endyrbvchildren">
                               
                           </table>
                       </td>
                   </table>
               </tr>
        </table>      
    </div>
</div>


<script>
    
$("#depreciation").click(function(){
    var useful_life = parseInt(document.getElementById("useful").value);    
    var salvage_value = parseInt(document.getElementById('salvage').value);
    var beginning_book_value = parseInt(document.getElementById('book_value').innerText);
    var beginning_book_value_handle = beginning_book_value;
    var annual_depreciation = (beginning_book_value - salvage_value)/useful_life;
    var annual_depreciation_handle = annual_depreciation; 
    var annual_depreciation_second_handle = annual_depreciation; 
    var end_year_book_value = beginning_book_value - annual_depreciation; 
    
    for(var i = 0; i<useful_life;i++){
        document.getElementById('bbvchildren').innerHTML += "<tr><td>" + beginning_book_value + "</td></tr>";        
        beginning_book_value = beginning_book_value - annual_depreciation;                          
    }
    

    for(var i = 0; i<useful_life;i++){
        document.getElementById('deprchildren').innerHTML += "<tr><td>" + annual_depreciation + "</td></tr>";                                
    }
    
    for(var i = 0; i<useful_life;i++){
        document.getElementById('accdeprchildren').innerHTML += "<tr><td>" + annual_depreciation + "</td></tr>";   
        annual_depreciation = annual_depreciation + annual_depreciation_handle;                              
    }
    
    for(var i = 0; i<useful_life;i++){
        document.getElementById('endyrbvchildren').innerHTML += "<tr><td>" + end_year_book_value + "</td></tr>";     
        end_year_book_value = end_year_book_value - annual_depreciation_second_handle;                                       
    }
});

</script>


