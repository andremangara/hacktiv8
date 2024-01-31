function cekPalindrome(a) {
    var kata = document.getElementById("kata").value;
    var katadibalik = kata.split('').reverse().join('');
    var hasil = "";
    if (a == "ya") {
        if (kata == katadibalik) {
            hasil = "Palindrome";
        } else {
            hasil = "Tidak Palindrome";
        }
    } else {
        kata = kata.replace(/[^a-z0-9]/gi, '').toLowerCase();
        katadibalik = kata.split('').reverse().join('').toLowerCase();
        // 
        if (kata == katadibalik) {
            hasil = "Palindrome";
        } else {
            hasil = "Tidak Palindrome";
        }
    }
    return console.log(hasil);
}
