console.log("test")

$(function(){
            $('#select_prefecture').on('change',function(){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'/admin//blog/selected_prefecture',
                    type:'POST',
                    data:{
                        prefecture: $(this).val()
                    }
                })
                // Ajaxリクエストが成功した時発動
                .done(function (results) {
                    alert(results);
                    $("#selected_city option:not(:first-child)").remove(); //optionリセット
                    $("#selected_city").append(results);
                })
                // Ajaxリクエストが失敗した時発動
                .fail( (data) => {
                    alert("error"); //通信失敗時
                })
            });
        });