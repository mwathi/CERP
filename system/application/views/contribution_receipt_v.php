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
    input,select {
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

<br />
<br />

<div id="view_content">
    <div align="center" class="othertext">
        <div id="250div" class="holder" style="width: 25%; margin-left: 5%;">
            <br />
            </p>
            Cause: <?=$causedata -> Causes -> Name; ?>
            <br />
            <br />
            <p style="border-bottom: 1px solid grey"></p>
            <br />
            

            
            
            Member Name: <?=$causedata -> Flock ->  First_Name . $causedata -> Flock -> Last_Name ." ". $causedata -> Flock -> Surname ?>
            <br />
            <br />
            <br />
            <p style="border-bottom: 1px solid grey"></p>
            <br />
            
            Amount Pledged : <?=$causedata -> Pledge ?>
            <br />
            <br />
            Amount Contributed: <strong><?=$causedata -> Contribution_Made ?></strong>
            <br />
            <br />
            <p style="border-bottom: 1px solid grey"></p>
            
            <br />
            Telephone: <?=$causedata -> Telephone ?>
            <br />
            <br />
            Postal Address: <?=$causedata -> Address ?>
            <br />
            <br />
            E-mail Address: <?=$causedata -> Email ?>
            <br />
            <br />
            Date Of Contribution: <?=$causedata -> Date_of_Contribution ?>
            <br />
            <br />
            <br />
        </div>
</form>
    </div>
</div>
