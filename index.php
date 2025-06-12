
<!DOCTYPE html>
<html>
<head>
    <title>Number Stats</title>
    <link rel="stylesheet" href="styles.css" >
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="main-content">
    <div id="form-element">
        <h2 class="main-heading">Number App</h2>
        <form id="numberForm">
            <h4>Enter Numbers</h4>
            <input type="text" name="numbers" id="numbers" placeholder="e.g. 4, 6, 2, 9"><br>
            <div  class="btn-group">
            <button type="submit" class="btn">Submit</button> 
            <button type="button" id="clearBtn" class="btn">Clear</button>
</div>
        </form>
    </div>
    <div id="result" style="margin-top:20px;"><h4 style="text-align:center"><strong> Results </strong></h4></div>
</div>
<script src="script.js"></script>
</body>
</html>

