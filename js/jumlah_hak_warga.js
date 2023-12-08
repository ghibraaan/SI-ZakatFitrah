const kategori = document.getElementById('kategori');

const getHak = async () => {
    const response = await fetch('http://localhost/web_zakatfitrah/pages/distribusi_warga/data_kategori.php');
    return response.json();
}

const fillCategories = async () => {
    const categories = await getHak();
    const hakBox = document.getElementById('hak');

    for (const category of categories) {
        if (category.nama_kategori === kategori.value) {
            hakBox.value = category.jumlah_hak;
        } else if (kategori.value === "") {
            hakBox.value = null;
        }
    }
};

kategori.addEventListener('change', (event) => {
    fillCategories();
});