$(document).ready(function(){

 //EDITOR CODE

ClassicEditor
  .create( document.querySelector( '#body' ) )
  .catch( error => {
      console.error( error );
  } );

//REST OF THE CODE

$('#selectAllBoxes').click(function(event){

if (this.checked) {
  $('.checkBoxes').each(function() {

    this.checked = true;

  });

} else {

  $('.checkBoxes').each(function(){

<<<<<<< Updated upstream
          this.checked = false;
        });
    }
users_online();
} );




function loadUsersOnline() {
      $.get("functions.php?onlineusers=result", function(data){
          $(".useresonline").text(data);
      });
}

setInterval(function() {
  loadUsersOnline();
},500);

=======
    this.checked = false;
  });
}

} );


>>>>>>> Stashed changes
});
