$(document).ready(function(){
    $('.delete-btn').click(function(){
      $buttonId=$(this).attr('id').slice(7,);
      // $(this).css('background-color','red');
      // $.post("../AjaxLoader/updateScores.php",)
      $.get(
      "../AjaxLoader/updateScores.php?deleteId=" +
        $buttonId,
      function (data, status) {
        console.log(data);
      }
    );
    });
  });