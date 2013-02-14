<?php
error_reporting(E_ALL^E_NOTICE);

?>
<link href="<?php echo base_url().'system/CSS/jquery.ui.css'?>" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'system/Scripts/jquery.ui.js'?>"></script>

<style>
	input, p, select {
		font: .85em "Segoe UI", Segoe, Arial, Sans-Serif;
	}
	::-webkit-input-placeholder, select {
		font-style: italic;
	}
	::-webkit-input-placeholder {
		font-size: 12px;
		text-align: center;
	}
	input, select {
		text-align: center;
		width: 150px;
	}
	.submit {
		letter-spacing: 1px;
		text-align: center;
		color: white;
		height: 35px;
		width: 150px;
		padding: 0 8px;
		line-height: 15px;
		border: 1px solid gainsboro;
		background-color: #660198;
		cursor: pointer;
	}
	.submit:hover {
		background-color: #9A32CD;
	}

</style>

<div id="view_content">
	<div align="center" class="othertext">

		<?php
        $attributes = array('enctype' => 'multipart/form-data');
        echo form_open('sunday_money/save', $attributes);
        echo validation_errors('
<p class="error">', '</p>
');
		?>
		<div style="height: 50px"></div>
		<div id="250div" class="holder" style="width: 25%; margin-left: 5%;">

<div class="Accordion" id="sampleAccordion" tabindex="0">
    <div class="AccordionPanel">
        <div class="AccordionPanelTab"><b>Youth Service Amount</b></div>
        <div class="AccordionPanelContent">
            <table>
                <th>Denominations</th>
                <tr>
                    <td><input type="text" id="1000youth" onfocusout="document.getElementById('1000yth').value = (parseInt(document.getElementById('1000youth').value) * parseInt(document.getElementById('1000y').innerText))"/></td>
                    <td id="1000y">1000</td>
                    <td>
                        <?php
                        $data_search = array('name' => '1000youth', 'value' => $thousandyouth, 'class' => 'othertext', 'id' => '1000yth');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="500youth" onfocusout="document.getElementById('500yth').value = (parseInt(document.getElementById('500youth').value) * parseInt(document.getElementById('500y').innerText))"/></td>
                    <td id="500y">500</td>
                    <td>
                        <?php
                        $data_search = array('name' => '500youth', 'value' => $fivehundredyouth, 'class' => 'othertext','id' => '500yth');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="200youth" onfocusout="document.getElementById('200yth').value = (parseInt(document.getElementById('200youth').value) * parseInt(document.getElementById('200y').innerText))"/></td>
                    <td id="200y">200</td>
                    <td>
                        <?php
                        $data_search = array('name' => '200youth', 'value' => $twohundredyouth, 'class' => 'othertext', 'id' => '200yth');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="100youth" onfocusout="document.getElementById('100yth').value = (parseInt(document.getElementById('100youth').value) * parseInt(document.getElementById('100y').innerText))"/></td>
                    <td id="100y">100</td>
                    <td>
                        <?php
                        $data_search = array('name' => '100youth', 'value' => $hundredyouth, 'class' => 'othertext', 'id' => '100yth');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="50youth" onfocusout="document.getElementById('50yth').value = (parseInt(document.getElementById('50youth').value) * parseInt(document.getElementById('50y').innerText))"/></td>
                    <td id="50y">50</td>
                    <td>
                        <?php
                        $data_search = array('name' => '50youth', 'value' => $fiftyyouth, 'class' => 'othertext', 'id' => '50yth');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="20youth" onfocusout="document.getElementById('20yth').value = (parseInt(document.getElementById('20youth').value) * parseInt(document.getElementById('20y').innerText))"/></td>
                    <td id="20y">20</td>
                    <td>
                        <?php
                        $data_search = array('name' => '20youth', 'value' => $twentyyouth, 'class' => 'othertext', 'id' => '20yth');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="10youth" onfocusout="document.getElementById('10yth').value = (parseInt(document.getElementById('10youth').value) * parseInt(document.getElementById('10y').innerText))"/></td>
                    <td id="10y">10</td>
                    <td>
                        <?php
                        $data_search = array('name' => '10youth', 'value' => $tenyouth, 'class' => 'othertext', 'id' => '10yth');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="5youth" onfocusout="document.getElementById('5yth').value = (parseInt(document.getElementById('5youth').value) * parseInt(document.getElementById('5y').innerText))"/></td>
                    <td id="5y">5</td>
                    <td>
                        <?php
                        $data_search = array('name' => '5youth', 'value' => $fiveyouth, 'class' => 'othertext', 'id' => '5yth');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="1youth" onfocusout="document.getElementById('1yth').value = (parseInt(document.getElementById('1youth').value) * parseInt(document.getElementById('1y').innerText))"/></td>
                    <td id="1y">1</td>
                    <td>
                        <?php
                        $data_search = array('name' => '1youth', 'value' => $oneyouth, 'class' => 'othertext','id'=>'1yth');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
 
            </table>
        </div>
    </div>
    
    
    
    <!-------------------Changes start here----------------->
    <div class="AccordionPanel">
        <div class="AccordionPanelTab"><b>Teens Service Amount</b></div>
        <div class="AccordionPanelContent">
                      <table>
                <th>Denominations</th>
                <tr>
                    <td><input type="text" id="1000teens" onfocusout="document.getElementById('1000tee').value = (parseInt(document.getElementById('1000teens').value) * parseInt(document.getElementById('1000te').innerText))"/></td>
                    <td id="1000te">1000</td>
                    <td>
                        <?php
                        $data_search = array('name' => '1000teens', 'value' => $thousandteens, 'class' => 'othertext', 'id' => '1000tee');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="500teens" onfocusout="document.getElementById('500tee').value = (parseInt(document.getElementById('500teens').value) * parseInt(document.getElementById('500te').innerText))"/></td>
                    <td id="500te">500</td>
                    <td>
                        <?php
                        $data_search = array('name' => '500teens', 'value' => $fivehundredteens, 'class' => 'othertext', 'id' => '500tee');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="200teens" onfocusout="document.getElementById('200tee').value = (parseInt(document.getElementById('200teens').value) * parseInt(document.getElementById('200te').innerText))"/></td>
                    <td id="200te">200</td>
                    <td>
                        <?php
                        $data_search = array('name' => '200teens', 'value' => $twohundredteens, 'class' => 'othertext', 'id' => '200tee');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="100teens" onfocusout="document.getElementById('100tee').value = (parseInt(document.getElementById('100teens').value) * parseInt(document.getElementById('100te').innerText))"/></td>
                    <td id="100te">100</td>
                    <td>
                        <?php
                        $data_search = array('name' => '100teens', 'value' => $hundredteens, 'class' => 'othertext', 'id' => '100tee');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="50teens" onfocusout="document.getElementById('50tee').value = (parseInt(document.getElementById('50teens').value) * parseInt(document.getElementById('50te').innerText))"/></td>
                    <td id="50te">50</td>
                    <td>
                        <?php
                        $data_search = array('name' => '50teens', 'value' => $fiftyteens, 'class' => 'othertext', 'id' => '50tee');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="20teens" onfocusout="document.getElementById('20tee').value = (parseInt(document.getElementById('20teens').value) * parseInt(document.getElementById('20te').innerText))"/></td>
                    <td id="20te">20</td>
                    <td>
                        <?php
                        $data_search = array('name' => '20teens', 'value' => $twentyteens, 'class' => 'othertext', 'id' => '20tee');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="10teens" onfocusout="document.getElementById('10tee').value = (parseInt(document.getElementById('10teens').value) * parseInt(document.getElementById('10te').innerText))"/></td>
                    <td id="10te">10</td>
                    <td>
                        <?php
                        $data_search = array('name' => '10teens', 'value' => $tenteens, 'class' => 'othertext', 'id' => '10tee');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="5teens" onfocusout="document.getElementById('5tee').value = (parseInt(document.getElementById('5teens').value) * parseInt(document.getElementById('5te').innerText))"/></td>
                    <td id="5te">5</td>
                    <td>
                        <?php
                        $data_search = array('name' => '5teens', 'value' => $fiveteens, 'class' => 'othertext', 'id' => '5tee');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="1teens" onfocusout="document.getElementById('1tee').value = (parseInt(document.getElementById('1teens').value) * parseInt(document.getElementById('1te').innerText))"/></td>
                    <td id="1te">1</td>
                    <td>
                        <?php
                        $data_search = array('name' => '1teens', 'value' => $oneteen, 'class' => 'othertext', 'id' => '1tee');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="AccordionPanel">
        <div class="AccordionPanelTab"><b>Sunday School Amount</b></div>
        <div class="AccordionPanelContent">
                      <table>
                <th>Denominations</th>
                <tr>
                    <td><input type="text" id="1000sundayschool" onfocusout="document.getElementById('1000ss').value = (parseInt(document.getElementById('1000sundayschool').value) * parseInt(document.getElementById('1000s').innerText))"/></td>
                    <td id="1000s">1000</td>
                    <td>
                        <?php
                        $data_search = array('name' => '1000sundayschool', 'value' => $thousandsundayschool, 'class' => 'othertext', 'id' => '1000ss');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="500sundayschool" onfocusout="document.getElementById('500ss').value = (parseInt(document.getElementById('500sundayschool').value) * parseInt(document.getElementById('500s').innerText))"/></td>
                    <td id="500s">500</td>
                    <td>
                        <?php
                        $data_search = array('name' => '500sundayschool', 'value' => $fivehundredsundayschool, 'class' => 'othertext', 'id' => '500ss');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="200sundayschool" onfocusout="document.getElementById('200ss').value = (parseInt(document.getElementById('200sundayschool').value) * parseInt(document.getElementById('200s').innerText))"/></td>
                    <td id="200s">200</td>
                    <td>
                        <?php
                        $data_search = array('name' => '200sundayschool', 'value' => $twohundredsundayschool, 'class' => 'othertext', 'id' => '200ss');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="100sundayschool" onfocusout="document.getElementById('100ss').value = (parseInt(document.getElementById('100sundayschool').value) * parseInt(document.getElementById('100s').innerText))"/></td>
                    <td id="100s">100</td>
                    <td>
                        <?php
                        $data_search = array('name' => '100sundayschool', 'value' => $hundredsundayschool, 'class' => 'othertext', 'id' => '100ss');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="50sundayschool" onfocusout="document.getElementById('50ss').value = (parseInt(document.getElementById('50sundayschool').value) * parseInt(document.getElementById('50s').innerText))"/></td>
                    <td id="50s">50</td>
                    <td>
                        <?php
                        $data_search = array('name' => '50sundayschool', 'value' => $fiftysundayschool, 'class' => 'othertext', 'id' => '50ss');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="20sundayschool" onfocusout="document.getElementById('20ss').value = (parseInt(document.getElementById('20sundayschool').value) * parseInt(document.getElementById('20s').innerText))"/></td>
                    <td id="20s">20</td>
                    <td>
                        <?php
                        $data_search = array('name' => '20sundayschool', 'value' => $twentysundayschool, 'class' => 'othertext', 'id' => '20ss');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="10sundayschool" onfocusout="document.getElementById('10ss').value = (parseInt(document.getElementById('10sundayschool').value) * parseInt(document.getElementById('10s').innerText))"/></td>
                    <td id="10s">10</td>
                    <td>
                        <?php
                        $data_search = array('name' => '10sundayschool', 'value' => $tensundayschool, 'class' => 'othertext', 'id' => '10ss');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="5sundayschool" onfocusout="document.getElementById('5ss').value = (parseInt(document.getElementById('5sundayschool').value) * parseInt(document.getElementById('5s').innerText))"/></td>
                    <td id="5s">5</td>
                    <td>
                        <?php
                        $data_search = array('name' => '5sundayschool', 'value' => $fivesundayschool, 'class' => 'othertext', 'id' => '5ss');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="1sundayschool" onfocusout="document.getElementById('1ss').value = (parseInt(document.getElementById('1sundayschool').value) * parseInt(document.getElementById('1s').innerText))"/></td>
                    <td id="1s">1</td>
                    <td>
                        <?php
                        $data_search = array('name' => '1sundayschool', 'value' => $onesundayschool, 'class' => 'othertext', 'id' => '1ss');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
 
            </table>
        </div>
    </div>
       
        <div class="AccordionPanel">
        <div class="AccordionPanelTab"><b>English Service Amount</b></div>
        <div class="AccordionPanelContent">
                      <table>
                <th>Denominations</th>
                <tr>
                    <td><input type="text" id="1000englishservice" onfocusout="document.getElementById('1000es').value = (parseInt(document.getElementById('1000englishservice').value) * parseInt(document.getElementById('1000e').innerText))"/></td>
                    <td id="1000e">1000</td>
                    <td>
                        <?php
                        $data_search = array('name' => '1000englishservice', 'value' => $thousandenglishservice, 'class' => 'othertext', 'id' => '1000es');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="500englishservice" onfocusout="document.getElementById('500es').value = (parseInt(document.getElementById('500englishservice').value) * parseInt(document.getElementById('500e').innerText))"/></td>
                    <td id="500e">500</td>
                    <td>
                        <?php
                        $data_search = array('name' => '500englishservice', 'value' => $fivehundredenglishservice, 'class' => 'othertext', 'id' => '500es');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="200englishservice" onfocusout="document.getElementById('200es').value = (parseInt(document.getElementById('200englishservice').value) * parseInt(document.getElementById('200e').innerText))"/></td>
                    <td id="200e">200</td>
                    <td>
                        <?php
                        $data_search = array('name' => '200englishservice', 'value' => $twohundredenglishservice, 'class' => 'othertext', 'id' => '200es');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="100englishservice" onfocusout="document.getElementById('100es').value = (parseInt(document.getElementById('100englishservice').value) * parseInt(document.getElementById('100e').innerText))"/></td>
                    <td id="100e">100</td>
                    <td>
                        <?php
                        $data_search = array('name' => '100englishservice', 'value' => $hundredenglishservice, 'class' => 'othertext', 'id' => '100es');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="50englishservice" onfocusout="document.getElementById('50es').value = (parseInt(document.getElementById('50englishservice').value) * parseInt(document.getElementById('50e').innerText))"/></td>
                    <td id="50e">50</td>
                    <td>
                        <?php
                        $data_search = array('name' => '50englishservice', 'value' => $fiftyenglishservice, 'class' => 'othertext', 'id' => '50es');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="20englishservice" onfocusout="document.getElementById('20es').value = (parseInt(document.getElementById('20englishservice').value) * parseInt(document.getElementById('20e').innerText))"/></td>
                    <td id="20e">20</td>
                    <td>
                        <?php
                        $data_search = array('name' => '20englishservice', 'value' => $twentyenglishservice, 'class' => 'othertext', 'id' => '20es');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="10englishservice" onfocusout="document.getElementById('10es').value = (parseInt(document.getElementById('10englishservice').value) * parseInt(document.getElementById('10e').innerText))"/></td>
                    <td id="10e">10</td>
                    <td>
                        <?php
                        $data_search = array('name' => '10englishservice', 'value' => $tenenglishservice, 'class' => 'othertext', 'id' => '10es');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="5englishservice" onfocusout="document.getElementById('5es').value = (parseInt(document.getElementById('5englishservice').value) * parseInt(document.getElementById('5e').innerText))"/></td>
                    <td id="5e">5</td>
                    <td>
                        <?php
                        $data_search = array('name' => '5englishservice', 'value' => $fiveenglishservice, 'class' => 'othertext', 'id' => '5es');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="1englishservice" onfocusout="document.getElementById('1es').value = (parseInt(document.getElementById('1englishservice').value) * parseInt(document.getElementById('1e').innerText))"/></td>
                    <td id="1e">1</td>
                    <td>
                        <?php
                        $data_search = array('name' => '1englishservice', 'value' => $oneenglishservice, 'class' => 'othertext', 'id' => '1es');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
 
            </table>
        </div>
    </div>
    
        <div class="AccordionPanel">
        <div class="AccordionPanelTab"><b>Swahili Service Amount</b></div>
        <div class="AccordionPanelContent">
                       <table>
                <th>Denominations</th>
                <tr>
                    <td><input type="text" id="1000swahiliservice" onfocusout="document.getElementById('1000kis').value = (parseInt(document.getElementById('1000swahiliservice').value) * parseInt(document.getElementById('1000k').innerText))"/></td>
                    <td id="1000k">1000</td>
                    <td>
                        <?php
                        $data_search = array('name' => '1000swahiliservice', 'value' => $thousandswahiliservice, 'class' => 'othertext', 'id' => '1000kis');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="500swahiliservice" onfocusout="document.getElementById('500kis').value = (parseInt(document.getElementById('500swahiliservice').value) * parseInt(document.getElementById('500k').innerText))"/></td>
                    <td id="500k">500</td>
                    <td>
                        <?php
                        $data_search = array('name' => '500swahiliservice', 'value' => $fivehundredswahiliservice, 'class' => 'othertext', 'id' => '500kis');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="200swahiliservice" onfocusout="document.getElementById('200kis').value = (parseInt(document.getElementById('200swahiliservice').value) * parseInt(document.getElementById('200k').innerText))"/></td>
                    <td id="200k">200</td>
                    <td>
                        <?php
                        $data_search = array('name' => '200swahiliservice', 'value' => $twohundredswahiliservice, 'class' => 'othertext', 'id' => '200kis');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="100swahiliservice" onfocusout="document.getElementById('100kis').value = (parseInt(document.getElementById('100swahiliservice').value) * parseInt(document.getElementById('100k').innerText))"/></td>
                    <td id="100k">100</td>
                    <td>
                        <?php
                        $data_search = array('name' => '100englishservice', 'value' => $hundredenglishservice, 'class' => 'othertext', 'id' => '100kis');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="50swahiliservice" onfocusout="document.getElementById('50kis').value = (parseInt(document.getElementById('50swahiliservice').value) * parseInt(document.getElementById('50k').innerText))"/></td>
                    <td id="50k">50</td>
                    <td>
                        <?php
                        $data_search = array('name' => '50swahiliservice', 'value' => $fiftyswahiliservice, 'class' => 'othertext', 'id' => '50kis');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="20swahiliservice" onfocusout="document.getElementById('20kis').value = (parseInt(document.getElementById('20swahiliservice').value) * parseInt(document.getElementById('20k').innerText))"/></td>
                    <td id="20k">20</td>
                    <td>
                        <?php
                        $data_search = array('name' => '20swahiliservice', 'value' => $twentyswahiliservice, 'class' => 'othertext', 'id' => '20kis');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="10swahiliservice" onfocusout="document.getElementById('10kis').value = (parseInt(document.getElementById('10swahiliservice').value) * parseInt(document.getElementById('10k').innerText))"/></td>
                    <td id="10k">10</td>
                    <td>
                        <?php
                        $data_search = array('name' => '10swahiliservice', 'value' => $tenswahiliservice, 'class' => 'othertext', 'id' => '10kis');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="5swahiliservice" onfocusout="document.getElementById('5kis').value = (parseInt(document.getElementById('5swahiliservice').value) * parseInt(document.getElementById('5k').innerText))"/></td>
                    <td id="5k">5</td>
                    <td>
                        <?php
                        $data_search = array('name' => '5swahiliservice', 'value' => $fiveswahiliservice, 'class' => 'othertext', 'id' => '5kis');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="1swahiliservice" onfocusout="document.getElementById('1kis').value = (parseInt(document.getElementById('1swahiliservice').value) * parseInt(document.getElementById('1k').innerText))"/></td>
                    <td id="1k">1</td>
                    <td>
                        <?php
                        $data_search = array('name' => '1swahiliservice', 'value' => $oneswahiliservice, 'class' => 'othertext', 'id' => '1kis');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
 
            </table>
        </div>
    </div>
    
        <div class="AccordionPanel">
        <div class="AccordionPanelTab"><b>Monthly Pledge Amount</b></div>
        <div class="AccordionPanelContent">
                       <table>
                <th>Denominations</th>
                <tr>
                    <td><input type="text" id="1000monthlypledge" onfocusout="document.getElementById('1000mlp').value = (parseInt(document.getElementById('1000monthlypledge').value) * parseInt(document.getElementById('1000m').innerText))"/></td>
                    <td id="1000m">1000</td>
                    <td>
                        <?php
                        $data_search = array('name' => '1000monthlypledge', 'value' => $thousandmonthlypledge, 'class' => 'othertext', 'id' => '1000mlp');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="500monthlypledge" onfocusout="document.getElementById('500mlp').value = (parseInt(document.getElementById('500monthlypledge').value) * parseInt(document.getElementById('500m').innerText))"/></td>
                    <td id="500m">500</td>
                    <td>
                        <?php
                        $data_search = array('name' => '500monthlypledge', 'value' => $fivehundredmonthlypledge, 'class' => 'othertext', 'id' => '500mlp');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="200monthlypledge" onfocusout="document.getElementById('200mlp').value = (parseInt(document.getElementById('200monthlypledge').value) * parseInt(document.getElementById('200m').innerText))"/></td>
                    <td id="200m">200</td>
                    <td>
                        <?php
                        $data_search = array('name' => '200monthlypledge', 'value' => $twohundredmonthlypledge, 'class' => 'othertext', 'id' => '200mlp');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="100monthlypledge" onfocusout="document.getElementById('100mlp').value = (parseInt(document.getElementById('100monthlypledge').value) * parseInt(document.getElementById('100m').innerText))"/></td>
                    <td id="100m">100</td>
                    <td>
                        <?php
                        $data_search = array('name' => '100monthlypledge', 'value' => $hundredmonthlypledge, 'class' => 'othertext', 'id' => '100mlp');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="50monthlypledge" onfocusout="document.getElementById('50mlp').value = (parseInt(document.getElementById('50monthlypledge').value) * parseInt(document.getElementById('50m').innerText))"/></td>
                    <td id="50m">50</td>
                    <td>
                        <?php
                        $data_search = array('name' => '50monthlypledge', 'value' => $fiftymonthlypledge, 'class' => 'othertext', 'id' => '50mlp');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="20monthlypledge" onfocusout="document.getElementById('20mlp').value = (parseInt(document.getElementById('20monthlypledge').value) * parseInt(document.getElementById('20m').innerText))"/></td>
                    <td id="20m">20</td>
                    <td>
                        <?php
                        $data_search = array('name' => '20monthlypledge', 'value' => $twentymonthlypledge, 'class' => 'othertext', 'id' => '20mlp');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="10monthlypledge" onfocusout="document.getElementById('10mlp').value = (parseInt(document.getElementById('10monthlypledge').value) * parseInt(document.getElementById('10m').innerText))"/></td>
                    <td id="10m">10</td>
                    <td>
                        <?php
                        $data_search = array('name' => '10monthlypledge', 'value' => $tenmonthlypledge, 'class' => 'othertext', 'id' => '10mlp');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="5monthlypledge" onfocusout="document.getElementById('5mlp').value = (parseInt(document.getElementById('5monthlypledge').value) * parseInt(document.getElementById('5m').innerText))"/></td>
                    <td id="5m">5</td>
                    <td>
                        <?php
                        $data_search = array('name' => '5monthlypledge', 'value' => $fivemonthlypledge, 'class' => 'othertext', 'id' => '5mlp');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="1monthlypledge" onfocusout="document.getElementById('1mlp').value = (parseInt(document.getElementById('1monthlypledge').value) * parseInt(document.getElementById('1m').innerText))"/></td>
                    <td id="1m">1</td>
                    <td>
                        <?php
                        $data_search = array('name' => '1monthlypledge', 'value' => $onemonthlypledge, 'class' => 'othertext', 'id' => '1mlp');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
 
            </table>
        </div>
    </div>
    
        <div class="AccordionPanel">
        <div class="AccordionPanelTab"><b>Thanksgiving Amount</b></div>
        <div class="AccordionPanelContent">
                      <table>
                <th>Denominations</th>
                <tr>
                    <td><input type="text" id="1000thanksgiving" onfocusout="document.getElementById('1000thk').value = (parseInt(document.getElementById('1000thanksgiving').value) * parseInt(document.getElementById('1000th').innerText))"/></td>
                    <td id="1000th">1000</td>
                    <td>
                      <?php
                        $data_search = array('name' => '1000thanksgiving', 'value' => $thousandthanksgiving, 'class' => 'othertext', 'id' => '1000thk');
                        echo form_input($data_search);
                        ?>  
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="500thanksgiving" onfocusout="document.getElementById('500thk').value = (parseInt(document.getElementById('500thanksgiving').value) * parseInt(document.getElementById('500th').innerText))"/></td>
                    <td id="500th">500</td>
                    <td>
                        <?php
                        $data_search = array('name' => '500thanksgiving', 'value' => $fivehundredthanksgiving, 'class' => 'othertext', 'id' => '500thk');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="200thanksgiving" onfocusout="document.getElementById('200thk').value = (parseInt(document.getElementById('200thanksgiving').value) * parseInt(document.getElementById('200th').innerText))"/></td>
                    <td id="200th">200</td>
                    <td>
                        <?php
                        $data_search = array('name' => '200thanksgiving', 'value' => $twohundredthanksgiving, 'class' => 'othertext', 'id' => '200thk');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="100thanksgiving" onfocusout="document.getElementById('100thk').value = (parseInt(document.getElementById('100thanksgiving').value) * parseInt(document.getElementById('100th').innerText))"/></td>
                    <td id="100th">100</td>
                    <td>
                        <?php
                        $data_search = array('name' => '100thanksgiving', 'value' => $hundredthanksgiving, 'class' => 'othertext', 'id' => '100thk');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="50thanksgiving" onfocusout="document.getElementById('50thk').value = (parseInt(document.getElementById('50thanksgiving').value) * parseInt(document.getElementById('50th').innerText))"/></td>
                    <td id="50th">50</td>
                    <td>
                    <?php
                        $data_search = array('name' => '50thanksgiving', 'value' => $fiftythanksgiving, 'class' => 'othertext', 'id' => '50thk');
                        echo form_input($data_search);
                        ?></td>
                </tr>
                
                <tr>
                    <td><input type="text" id="20thanksgiving" onfocusout="document.getElementById('20thk').value = (parseInt(document.getElementById('20thanksgiving').value) * parseInt(document.getElementById('20th').innerText))"/></td>
                    <td id="20th">20</td>
                    <td>
                        <?php
                        $data_search = array('name' => '20thanksgiving', 'value' => $twentythanksgiving, 'class' => 'othertext', 'id' => '20thk');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="10thanksgiving" onfocusout="document.getElementById('10thk').value = (parseInt(document.getElementById('10thanksgiving').value) * parseInt(document.getElementById('10th').innerText))"/></td>
                    <td id="10th">10</td>
                    <td>
                        <?php
                        $data_search = array('name' => '10thanksgiving', 'value' => $tenthanksgiving, 'class' => 'othertext', 'id' => '10thk');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="5thanksgiving" onfocusout="document.getElementById('5thk').value = (parseInt(document.getElementById('5thanksgiving').value) * parseInt(document.getElementById('5th').innerText))"/></td>
                    <td id="5th">5</td>
                    <td>
                        <?php
                        $data_search = array('name' => '5thanksgiving', 'value' => $fivethanksgiving, 'class' => 'othertext', 'id' => '5thk');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="1thanksgiving" onfocusout="document.getElementById('1thk').value = (parseInt(document.getElementById('1thanksgiving').value) * parseInt(document.getElementById('1th').innerText))"/></td>
                    <td id="1th">1</td>
                    <td>
                        <?php
                        $data_search = array('name' => '1thanksgiving', 'value' => $onethanksgiving, 'class' => 'othertext', 'id' => '1thk');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
 
            </table>
        </div>
    </div>
    
        <div class="AccordionPanel">
        <div class="AccordionPanelTab"><b>Tithe Amount</b></div>
        <div class="AccordionPanelContent">
                       <table>
                <th>Denominations</th>
                <tr>
                    <td><input type="text" id="1000tithe" onfocusout="document.getElementById('1000tth').value = (parseInt(document.getElementById('1000tithe').value) * parseInt(document.getElementById('1000t').innerText))"/></td>
                    <td id="1000t">1000</td>
                    <td>
                        <?php
                        $data_search = array('name' => '1000tithe', 'value' => $thousandtithe, 'class' => 'othertext', 'id' => '1000tth');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="500tithe" onfocusout="document.getElementById('500tth').value = (parseInt(document.getElementById('500tithe').value) * parseInt(document.getElementById('500t').innerText))"/></td>
                    <td id="500t">500</td>
                    <td>
                        <?php
                        $data_search = array('name' => '500tithe', 'value' => $fivehundredtithe, 'class' => 'othertext', 'id' => '500tth');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="200tithe" onfocusout="document.getElementById('200tth').value = (parseInt(document.getElementById('200tithe').value) * parseInt(document.getElementById('200t').innerText))"/></td>
                    <td id="200t">200</td>
                    <td>
                        <?php
                        $data_search = array('name' => '200tithe', 'value' => $twohundredtithe, 'class' => 'othertext', 'id' => '200tth');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="100tithe" onfocusout="document.getElementById('100tth').value = (parseInt(document.getElementById('100tithe').value) * parseInt(document.getElementById('100t').innerText))"/></td>
                    <td id="100t">100</td>
                    <td>
                        <?php
                        $data_search = array('name' => '100tithe', 'value' => $hundredtithe, 'class' => 'othertext', 'id' => '100tth');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="50tithe" onfocusout="document.getElementById('50tth').value = (parseInt(document.getElementById('50tithe').value) * parseInt(document.getElementById('50t').innerText))"/></td>
                    <td id="50t">50</td>
                    <td>
                        <?php
                        $data_search = array('name' => '50tithe', 'value' => $fiftytithe,'class' => 'othertext', 'id' => '50tth');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="20tithe" onfocusout="document.getElementById('20tth').value = (parseInt(document.getElementById('20tithe').value) * parseInt(document.getElementById('20t').innerText))"/></td>
                    <td id="20t">20</td>
                    <td>
                        <?php
                        $data_search = array('name' => '20tithe', 'value' => $twentytithe, 'class' => 'othertext', 'id' => '20tth');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="10tithe" onfocusout="document.getElementById('10tth').value = (parseInt(document.getElementById('10tithe').value) * parseInt(document.getElementById('10t').innerText))"/></td>
                    <td id="10t">10</td>
                    <td>
                        <?php
                        $data_search = array('name' => '10tithe', 'value' => $tentithe, 'class' => 'othertext', 'id' => '10tth');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="5tithe" onfocusout="document.getElementById('5tth').value = (parseInt(document.getElementById('5tithe').value) * parseInt(document.getElementById('5t').innerText))"/></td>
                    <td id="5t">5</td>
                    <td>
                        <?php
                        $data_search = array('name' => '5tithe', 'value' => $fivetithe, 'class' => 'othertext', 'id' => '5tth');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="text" id="1tithe" onfocusout="document.getElementById('1tth').value = (parseInt(document.getElementById('1tithe').value) * parseInt(document.getElementById('1t').innerText))"/></td>
                    <td id="1t">1</td>
                    <td>
                        <?php
                        $data_search = array('name' => '1tithe', 'value' => $onetithe, 'class' => 'othertext', 'id' => '1tth');
                        echo form_input($data_search);
                        ?>
                    </td>
                </tr>
                
  
 
            </table>
        </div>
    </div>
</div>
              
                    <td><input type="submit" class="submit" /></td>
                
		</div>
		</form>
	</div>
</div>

            <!--table>
                <i>In gratitude for God's blessings, I/we pledge to contribute for Christ's work for <?php echo date('Y')?></i>
                <p>
                    <i> Add Tithe or Offering Information</i>
                </p>
                <br />
                
                <tr>
                <td>
                    Youth Service Amount
                </td>
                <td>    
                    <input type="text" name="youthservice" id="youthservice" value="0" onfocusout="dave()"/>
                </td>
                </tr>
                
                <tr>
                <td>
                Teens Service Amount
                </td>
                <td>
                <input type="text" name="teens" id="teens" value="0" onfocusout="dave()"/>
                </td>
                </tr>
                
                <tr>
                <td>
                Sunday School Amount</td>
                <td><input type="text" name="sunday_school" id="ss" value="0" onfocusout="dave()"/>
                </td>
                </tr>
                
                <tr>
                <td>
                English Service Amount
                </td>
                <td>
                <input type="text" name="english_service" id="es" value="0" onfocusout="dave()"/>
                </td>
                </tr>
                
                <tr>
                <td>
                Swahili Service Amount
                </td>
                <td>
                <input type="text" name="swahili_service" id="sws" value="0" onfocusout="dave()"/>
                </td>
                </tr>
                
                <tr>
                <td>
                Monthly Pledge Amount
                </td>
                <td>
                <input type="text" name="monthly_pledge" id="mp" value="0" onfocusout="dave()"/>
                </td>
                </tr>
                
                <tr>
                <td>
                Thanksgiving Amount
                </td>
                <td>
                <input type="text" name="thanksgiving" id="thk" value="0" onfocusout="dave()" />
                </td>
                </tr>
                
                <tr>
                <td>
                Tithe Amount
                </td>
                <td>
                <input type="text" name="tithe" id="tih" value="0" onfocusout="dave()"/>
                </td>
                </tr>
                
                <tr>
                    <td><b>Total</b></td>
                    
                <td><label id="total"></label></td>
                </tr>
                
                <tr height="10px"></tr>
                <tr>
                    <td></td>
                <td><input type="submit" class="submit" /></td>
                </tr>
                
            </table-->


<script>
	function dave() {
		var val1 = parseInt(document.getElementById('youthservice').value);
		var val2 = parseInt(document.getElementById('teens').value);
		var val3 = parseInt(document.getElementById('ss').value);
		var val4 = parseInt(document.getElementById('es').value);
		var val5 = parseInt(document.getElementById('sws').value);
		var val6 = parseInt(document.getElementById('mp').value);
		var val7 = parseInt(document.getElementById('thk').value);
		var val8 = parseInt(document.getElementById('tih').value);

		var total = val1 + val2 + val3 + val4 + val5 + val6 + val7 + val8
		document.getElementById("total").innerHTML = total;
	}
</script>


<script language="JavaScript" type="text/javascript">
        var sampleAccordion = new Spry.Widget.Accordion("sampleAccordion");
</script>