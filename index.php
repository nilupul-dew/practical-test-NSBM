
<!DOCTYPE html>
<html>
<head>
    <title>Number Stats</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<h2>Enter Numbers (comma-separated):</h2>
<form id="numberForm">
    <input type="text" name="numbers" id="numbers" placeholder="e.g. 4, 6, 2, 9">
    <button type="submit">Submit</button>
</form>

<div id="result" style="margin-top:20px;"></div>

<script>
$(document).ready(function(){
    $('#numberForm').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            url: 'process.php',
            type: 'POST',
            data: { numbers: $('#numbers').val() },
            dataType: 'json',
            success: function(response){
                if (response.error) {
                    $('#result').html("<p style='color:red'>" + response.error + "</p>");
                } else {
                    $('#result').html(`
                        <p><strong>Max:</strong> ${response.max}</p>
                        <p><strong>Min:</strong> ${response.min}</p>
                        <p><strong>Average:</strong> ${response.avg}</p>
                    `);
                }
            },
            error: function(){
                $('#result').html("<p style='color:red'>An error occurred.</p>");
            }
        });
    });
});
</script>

</body>
</html>

