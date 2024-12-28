
$("#title").on('input change',function(){
    //Verifica se o campo Titulo é maior do que 100 caracteres
    if($(this).val().length > 100)
    {
        //Mostra a mensagem de erro
        $("#title_error").show()
        $("#title_error").text("Quantidade de caracteres passou do limite, maximo 100")
         //Ao atingir 100 caracteres ele limita a quantidade, nao sendo possivel adicionar mais
         $(this).val($(this).val().substring(0,100))
    }
    else
    {
        //Senão tiver ele esconde a mensagem de erro
        $("#title_error").hide()
        $("#title_error").text("")
    }
})


$("#resume").on('input change',function(){
    //Verifica se o campo Titulo é maior do que 100 caracteres
    if($(this).val().length > 300)
    {
        //Mostra a mensagem de erro
        $("#resume_error").show()
        $("#resume_error").text("Quantidade de caracteres passou do limite, maximo 300")
         //Ao atingir 100 caracteres ele limita a quantidade, nao sendo possivel adicionar mais
         $(this).val($(this).val().substring(0,300))
    }
    else
    {
        //Senão tiver ele esconde a mensagem de erro
        $("#resume_error").hide()
        $("#resume_error").text("")
    }
})


$("#body").on('input change',function(){
    //Verifica se o campo Titulo é maior do que 100 caracteres
    if($(this).val().length > 3000)
    {
         //Mostra a mensagem de erro
        $("#body_error").show()
        $("#body_error").text("Quantidade de caracteres passou do limite, maximo 3000")

         //Ao atingir 100 caracteres ele limita a quantidade, nao sendo possivel adicionar mais
         $(this).val($(this).val().substring(0,3000))
    }
    //Senão tiver ele esconde novamente
    else
    {
        $("#body_error").hide()
        $("#body_error").text("")
    }
})




