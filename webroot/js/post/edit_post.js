const getCsrfToken = () => {
    const meta = document.querySelector('meta[name="csrfToken"]');
    return meta ? meta.getAttribute('content') : null;
};

//Titulo do POST
$(".show_edit_title").click(function(){
    $(".main_title").hide()
    $(".edit_title").css({'display': 'flex'})
})

$(".new_title").click(function(){
    $(".main_title").css({'display': 'flex'})
    let old_title =  $("#old_title").val()
    let new_title = $(".edit_title > input[type='text']").val()
    let post_id = $("#post_id").val()
    $(".main_title > h1").text(new_title)
    console.log([
        old_title,new_title
    ])
    const token = getCsrfToken()
    fetch('/post/update',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-Token': token, // Incluindo o CSRF Token no cabeçalho
        },
        body: JSON.stringify({
            field: 'title',
            post_id,
            content: new_title
        })
    })
    .then(response => response.json())
    .then(data => {
        if(data.success === 1)
        {
            $(".edit_title > input").val(new_title)
        }else if(data.success === 0)
        {
            $(".main_title > h1").text(old_title)
            alert("Erro ao salvar campo")
        }
    })
    .catch(error => {
        console.log(error)
        $(".main_title > h1").text(old_title)
        alert("Erro ao salvar campo")
    })
    $(".edit_title").hide()
})

//Resumo do POST

$(".show_edit_resume").click(function(){
    $(".main_resume").hide()
    $(".edit_resume").css({'display': 'flex'})
})

$(".new_resume").click(function(){
    $(".main_resume").css({'display': 'flex'})
    let old_resume = $("#old_resume").val()
    let new_resume = $(".edit_resume > input[type='text']").val()
    let post_id = $("#post_id").val()
    $(".main_resume > p").text(new_resume)
    const token = getCsrfToken()
    fetch('/post/update',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-Token': token, // Incluindo o CSRF Token no cabeçalho
        },
        body: JSON.stringify({
            field: 'resume',
            post_id,
            content: new_resume
        })
    })
    .then(response => response.json())
    .then(data => {
        if(data.success === 1)
        {
            $(".edit_resume > input").val(new_resume)
        }else if(data.success === 0)
        {
            $(".main_resume > p").text(old_resume)
            alert("Erro ao salvar campo")
        }
    })
    .catch(error => {
        console.log(error)
        $(".main_resume > p").text(old_resume)
        console.error("Erro na atualização do titulo",error)
        alert("Erro ao salvar campo")
    })
    $(".edit_resume").hide()
})

//Corpo do POST
$(".show_edit_body").click(function(){
    $(".main_body").hide()
    $(".edit_body").show()
})

$(".new_body").click(function(){
    $(".main_body").show()
    let old_body = $("#old_body").val()
    let new_body = $(".edit_body > textarea").val()
    let post_id = $("#post_id").val()
    $(".main_body > p").text(new_body)
    const token = getCsrfToken()
    fetch('/post/update',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-Token': token, // Incluindo o CSRF Token no cabeçalho
        },
        body: JSON.stringify({
            field: 'body',
            post_id,
            content: new_body
        })
    })
    .then(response => response.json())
    .then(data => {
        if(data.success === 1)
        {

            $(".edit_body > textarea").val(new_body)
        }else if(data.success === 0)
        {
            console.log(error)
            $(".main_body > p").text(old_body)
            alert("Erro ao salvar campo")
        }
    })
    .catch(error => {
        console.log(error)
        $(".main_body > p").text(old_body)
        console.error("Erro na atualização do titulo",error)
        alert("Erro ao salvar campo")
    })
    $(".edit_body").hide()
})
