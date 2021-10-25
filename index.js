function ubah_user(id){
    $.ajax({
        type : "POST",
        url : "admin/data_user.php",
        data : {
            id : id
        },
        success : function(event){
            var json = event;

            $("#username").val(json[id].username);
            $("#phone").val(json[id].phone);
        }
    });
}