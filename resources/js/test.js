console.log("test")
$(function() {
  $("#prefecture_id").on("change", function(){

    var input = $("#prefecture_id").val();

    $.ajax({
      type: 'GET',
      url: '/products/search',
      data: { keyword: input },
      dataType: 'json'
    })

    .done(function(products) {
      $(".検索結果表示クラス").empty();
      if (products.length !==0) {
        $(".検索結果表示クラス").append("インクリメンタルサーチの結果を表示させる記述");
      }
      else {
        $(".検索結果表示クラス").append("検索結果がない旨を表示させる記述");
      }
    })
    .fail(function(){
      alert('映画検索に失敗しました');
    })
  })
})