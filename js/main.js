$(function () {
    $("#username").on("input", function () {
      var s = $(this).val().length;
      console.log("مقدار ورودی:", s),
        0 < s
          ? $(".one").addClass("move")
          : 0 == s && $(".one").removeClass("move");
    }),
      $("#password").on("input", function () {
        var s = $(this).val().length;
        console.log("مقدار ورودی:", s),
          0 < s
            ? $(".two").addClass("move")
            : 0 == s && $(".two").removeClass("move");
      })
     
  });