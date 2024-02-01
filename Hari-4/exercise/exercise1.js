function fetchUserData(callback) {
    // URL profil GitHub
    const githubUrl = 'https://api.github.com/users/andremangara';

    // Menggunakan Fetch API untuk mendapatkan data dari GitHub API
    fetch(githubUrl)
        .then(response => {
            // Memastikan response dari server adalah sukses (status code 200 OK)
            if (!response.ok) {
                throw new Error('Request gagal: ' + response.status);
            }
            // Mengonversi response ke dalam bentuk JSON
            return response.json();
        })
        .then(data => {
            // Mengambil username dari data pengguna GitHub
            const username = data.login;
            // Memanggil callback dengan username sebagai argumen
            callback(username);
        })
        .catch(error => {
            console.error('Terjadi kesalahan:', error);
        });
}

// Contoh penggunaan fungsi callback
fetchUserData(function (username) {
    console.log('Username GitHub:', username);
});