
function get_match(id) {
    var id = id;   
    $.ajax({
        type : 'post',       
        url: SITE_URL+'/notification/get_contest_by_matchid',
        data : { id : id },
        success : function(data) {
            $('#contest_id').html(data);
        }
    });
};


function get_players() {
    var id = $('#team_id').val();   

    $.ajax({
        type : 'post',       
        url: SITE_URL+'/players/get_players_by_teamid',
        data : { id : id },
        success : function(data) {
        	$('#player_hide').hide();
            $('#player_show').html(data);
        }
    });
};