$(".post_title > button").click(function(){
    const elemento_pai = $(this).parent().parent()
    elemento_pai.find(".resume").toggle()
})
