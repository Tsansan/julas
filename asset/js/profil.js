
// call button

const ubahData = document.getElementsByClassName('btn-enabled-edit')[0];
const cancelubah = document.getElementsByClassName('btn-enabled-cancel')[0];
const simpanubah = document.getElementsByClassName('btn-enabled-save')[0];

// triger button
// ubahData.addEventListener('click', ubahdata);
// proCancel.addEventListener('click', ubahdata);
ubahData.addEventListener('click', ubahdataakun);
cancelubah.addEventListener('click', ubahdataakun);

// function

function ubahdataakun() {

    const formAkun = document.getElementsByClassName('form-enable');
    let dataDisabled = formAkun[0].hasAttribute('disabled');

    if (dataDisabled) {
        for (let index = 0; index < formAkun.length; index++) {
            formAkun[index].removeAttribute('disabled');
        }

        cancelubah.removeAttribute('hidden')
        simpanubah.removeAttribute('hidden')
        ubahData.innerHTML = "Batal";
        ubahData.classList.remove('btn-primary');
        ubahData.classList.add('btn-secondary');
    } else {
        for (let index = 0; index < formAkun.length; index++) {
            formAkun[index].setAttribute('disabled', '');
        }
        cancelubah.setAttribute('hidden', '')
        simpanubah.setAttribute('hidden', '')
        ubahData.innerHTML = "Ubah";
        ubahData.classList.remove('btn-secondary');
        ubahData.classList.add('btn-primary');
    }

}

function ubahdata() {
    const nama = document.getElementById('pronama');
    const nip = document.getElementById('pronip');
    const nohp = document.getElementById('pronohp');
    const email = document.getElementById('proemail');
    const alamat = document.getElementById('proalamat');
    const mapel = document.getElementById('promapel');
    const proCancel = document.getElementById('procancel');
    const prosimpandata = document.getElementById('prosimpandata');
    let aku = nohp.hasAttribute('disabled');
    console.log(aku);

    if (aku) {
        console.log('halo');
        nama.removeAttribute('disabled')
        nip.removeAttribute('disabled')
        nohp.removeAttribute('disabled')
        email.removeAttribute('disabled')
        alamat.removeAttribute('disabled')
        mapel.removeAttribute('disabled')
        proCancel.removeAttribute('hidden')
        prosimpandata.removeAttribute('hidden')

        ubahData.innerHTML = "Batal";
        ubahData.classList.remove('btn-primary');
        ubahData.classList.add('btn-secondary');
    } else {
        nama.setAttribute('disabled', '')
        nip.setAttribute('disabled', '')
        nohp.setAttribute('disabled', '')
        email.setAttribute('disabled', '')
        alamat.setAttribute('disabled', '')
        mapel.setAttribute('disabled', '')
        proCancel.setAttribute('hidden', '')
        prosimpandata.setAttribute('hidden', '')

        ubahData.innerHTML = "Ubah"
        ubahData.classList.remove('btn-secondary');
        ubahData.classList.add('btn-primary');
    }
}