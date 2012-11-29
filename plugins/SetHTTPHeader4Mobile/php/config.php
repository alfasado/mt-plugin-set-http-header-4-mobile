<?php
class SetHTTPHeader4Mobile extends MTPlugin {

    var $registry = array(
        'name' => 'SetHTTPHeader4Mobile',
        'callbacks' => array(
            'build_page' => 'build_page'
        ),
    );

    function build_page ( $mt, $ctx, &$args, &$content ) {
        $app = $ctx->stash( 'bootstrapper' );
        $sjis = mb_check_encoding( $content, 'SJIS' );
        if ( $sjis ) {
            $app->send_http_header( 'text/html; charset=shift_jis', filemtime( $file ), strlen( $content ) );
            echo $content;
            exit();
        }
    }
}

?>