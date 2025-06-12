$(document).ready(function(){
    $('#numberForm').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            url: 'process.php',
            type: 'POST',
            data: { numbers: $('#numbers').val() }, //get the values in the input box.
            dataType: 'json', //response type sent from process.php
            success: function(response){
                if (response.error) {
                    $('#result').html("<p style='color:red'>" + response.error + "</p>");
                } else {
                    $('#result').html(`
                        <h4 style="text-align:center"><strong>Results</strong></h4>
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
    $('#clearBtn').on('click', function(){
    $('#numbers').val('');    // Clear input field
    $('#result').html('');    // Clear results div
});
});