var pencaker = document.getElementById('idpencaker')
var perusahaan = document.getElementById('idperusahaan')
var bkk = document.getElementById('idbkk')

$(document).ready(function(){
    if (document.getElementById('pencaker').checked == true) {
        pencaker.removeAttribute('hidden')
    } else if (document.getElementById('perusahaan').checked == true) {
        perusahaan.removeAttribute('hidden')
    } else if (document.getElementById('bkk').checked == true) {
        bkk.removeAttribute('hidden')
    }
});


function getBKK(params) {
    var bkk_input = document.getElementById('bkk-row')

    $.ajax({
        url: 'http://127.0.0.1:90/register',
        data: {
          format: 'json'
        },
        error: function() {
          $('#info').html('<p>An error has occurred</p>');
        },
        dataType: 'jsonp',
        success: function(data) {
          var $title = $('<h1>').text(data.talks[0].talk_title);
          var $description =  $('<p>').text(data.talks[0].talk_description);
          $('#info')
          .append($title)
          .append($description);
        },
        type: 'GET'
      });

}

function jenisUser(params) {
    if (params == 'pencaker') {
        pencaker.removeAttribute('hidden')
        perusahaan.setAttribute('hidden', '')
        bkk.setAttribute('hidden', '')
    } else if (params == 'perusahaan') {
        pencaker.setAttribute('hidden', '')
        perusahaan.removeAttribute('hidden')
        bkk.setAttribute('hidden', '')
    } else {
        pencaker.setAttribute('hidden', '')
        perusahaan.setAttribute('hidden', '')
        bkk.removeAttribute('hidden')
    }
}


