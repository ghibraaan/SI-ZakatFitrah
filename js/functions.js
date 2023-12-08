const jmlBayar = document.getElementById('jumlah_tanggunganyangdibayar');
const jenis = document.getElementById('jenis');

const fillValues = () => {
    const jml_uang = document.getElementById('bayar_uang');
    const jml_beras = document.getElementById('bayar_beras');
    if (jenis.value === 'Uang') {
        const tot = jmlBayar.value * 30000;
        jml_beras.value = 0;
        jml_uang.value = tot;
    } else if (jenis.value === 'Beras') {
        const tot = jmlBayar.value * 2.5;
        jml_beras.value = tot;
        jml_uang.value = 0;
    } else {
        jml_beras.value = null;
        jml_uang.value = null;
    }
};

jenis.addEventListener('change', (event) => {
    fillValues();
});