jQuery( function( $ ){
    $( '#filter' ).submit(function(){
        var filter = $(this);
        $.ajax({
            url : true_obj.ajaxurl, // PHP function, declaration in function.php -  wp_localize_script( 'filter', 'true_obj', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) )
            data : filter.serialize(), // data
            type : 'POST', // request type
            beforeSend : function( xhr ){
                filter.find( 'button' ).text( 'in progres' ); //cheng text on the button
            },
            success : function( data ){
                filter.find( 'button' ).text( 'Filter' ); // comeback previously button text
                $( '#filter-result' ).html(data);
            }
        });
        return false;
    });
});