$(function(){
    $(".wcifx-popup").click(function(){
        var dataModal = $(this).attr('data-modal')
        $(dataModal).modal('toggle');
        var url = $(this).attr('data-url');
        myAjax(url, {} , 'JSON' , 'GET').done(function(res){
            if(res.success == true){
                $(dataModal).html(res.data);
            }
        });
    });
    $(".modal").on('click', '#btn-member-login', function(){
        var email   = $("#email-login").val();
        var pass    = $("#pwd-login").val();
        myAjax("/cabinet/login", {'email':email, 'password':pass} , 'JSON' , 'POST').done(function(res){
            if(res.valid == false){
                $(".modal-message").html(res.message);
            }else{
                $(".modal-message").html(res.message);
                window.location.replace(BASE_URL+'cabinet');
            }
        });
    });
});