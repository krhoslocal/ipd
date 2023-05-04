function test() {


    $.post("data.php", {},
        function(data) {
            sendjson(data);
        }
    );
}

function sendjson(data) {

    $('#show_list').html("<img src='image/loading.gif'>");
    $.post("http://203.157.102.90/webservice_server/master.php", { url_json: data },
        function(data) {
            $('#show_list').html("Complete");
        }
    );

}