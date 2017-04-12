$(function() {

    var field = new Array("departure", "destination", "cost", "g_map", "description");

    $("form").submit(function(){ // обрабатываем отправку формы
        var error = 0; // индекс ошибки
        $("form").find(":input").each(function(){ //проверяем каждое поле в форме
            for(var i=0; i<field.length;i++){ // если поле находится в списке обязательных полей
                if($(this).attr("name")==field[i]){ //проверяем поле формы на пустоту

                    if(!$(this).val()){ //если поле пустое
                        $(this).css('border', 'red 1px solid'); //то устанавливаем рамку красного цвета
                        error=1; //определяем индекс ошибки
                    }
                    else{
                        $(this).css('border', 'gray 1px solid');//в ином случае устанавливаем рамку серого цвета
                    }
                }

            }
        })

        if(error == 0){ //если ошибок нет, то отправляем данные
            return true;
        }
        else{
            if(error==1) var err=text = "Не все обязательные поля заполнены!";
            $("#messenger").html(err_text);
            $("#messenger").fadeIn("slow");
            return false; // если в форме встретились ошибки, то не отсылаем данные на сервер
        }
    })
});