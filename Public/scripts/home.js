$(document).ready(function(){
    $('.addScoreButton').click(function(e){
      e.preventDefault();
      $userId=$(this).attr('id').slice(9,);
      $name = $('#name').val();
      $runs = $('#runs').val();
      $balls = $('#balls').val();
      $strikeRate=($runs/$balls)*100;
      
      $.post(
      "../AjaxLoader/updateScores.php?addScore=1",
      { userId : $userId, name : $name, runs : $runs, balls : $balls, strikeRate : $strikeRate},
      function (e) {
        $(".comments-div")
        console.log(e);
      });

    });
  });