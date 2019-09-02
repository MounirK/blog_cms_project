$(document).ready(function(){

    //EDITOR CHEDITOR
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
    console.error( error );
    } );
});

$(document).ready(function(){

    //loader page
    var div_box = "<div id='load-screen'><div id='loading'></div></div>";
    $("body").prepend(div_box);

    $('#load-screen').delay(700).fadeOut(600, function(){
        $(this).remove();
    });

});



