$("#showButton").click(function(){
    var operand = $("#choose option:selected" ).val().trim();
    var format = $("#dataType option:selected" ).text().trim();
    var question = $("#question").val().trim();
    console.log(format + " " + question);
    if(format.length === 0 || question.length === 0 || choose.length === 0)
        alert("Boş alan bırakmayın");
    else
        location.href = "http://localhost/bulmaca_sozluk/webservice/server.php?question="+question+"&format="+format+"&operand="+operand;
});