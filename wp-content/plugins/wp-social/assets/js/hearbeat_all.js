
jQuery(document).ready(function($){

    $(document).on('heartbeat-send.wslu', function(e, data) {

        console.log('Sending data to server globally ...........');
        data['global'] = 'atiqur';
        data['gd_client'] = 'marco';
    });

    $(document).on('heartbeat-tick.wslu', function(e, data) {

        console.log('Data received from HB, processing the global data....');

        if(data['client_push'] && data['client_push']['global']) {

            console.log('---Global receive : ', data['client_push']);
        }
    });

    $(document).on('heartbeat-error.wslu', function(e, jqXHR, textStatus, error) {
        console.log('BEGIN ERROR...............................');
        console.log(textStatus);
        console.log(error);
        console.log('END ERROR..................................');
    });

});



