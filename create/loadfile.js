function check(file)
{
    var filetemp = file.value.toLowerCase();
    if(filetemp.indexOf('.txt') == -1 && filetemp.indexOf('.jpg') == -1 && filetemp.indexOf('.gif') == -1 && filetemp.indexOf('.png') == -1 ) file.value = "";
    else{
        if(filetemp.indexOf('.txt') != -1)
        {
            if($("#file")[0].files[0].size > 100000) 
            {
                alert("Файл превышает допустимый размер (100КБ)");
                file.value = "";
            }
        }
    }
}

function fl(){
    $.ajax({
        type: "POST",
        url: "./script.php",
        data: "fl="+$("input[type=file]").val(),
        success: function(response){
            $('#response').html(response);
        }
    });
};

