var pencaker = document.getElementById('idpencaker')
var perusahaan = document.getElementById('idperusahaan')
var bkk = document.getElementById('idbkk')

function getKota(params) {
    var bkk = document.getElementById('bkk-row')
    bkk.setAttribute('hidden', '')
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


