function fetchUserData() {
    // URL profil GitHub
    const githubUrl = 'https://api.github.com/users/andremangara';

    // Mengembalikan Promise yang akan menyelesaikan atau menolak berdasarkan hasil fetch
    return new Promise((resolve, reject) => {
        // Menggunakan Fetch API untuk mendapatkan data dari GitHub API
        fetch(githubUrl)
            .then(response => {
                // Memastikan response dari server adalah sukses (status code 200 OK)
                if (!response.ok) {
                    throw new Error('Request gagal: ' + response.status);
                }
                // Mengonversi response ke dalam bentuk JSON dan mengembalikan data
                return response.json();
            })
            .then(data => {
                // Mengambil username dari data pengguna GitHub
                const username = data.login;
                // Menyelesaikan Promise dengan username sebagai hasil
                resolve(username);
            })
            .catch(error => {
                // Menolak Promise dengan pesan kesalahan jika terjadi kesalahan
                reject('Terjadi kesalahan: ' + error.message);
            });
    });
}

// Contoh penggunaan Promise
fetchUserData()
    .then(username => {
        console.log('Username GitHub:', username);
    })
    .catch(error => {
        console.error(error);
    });