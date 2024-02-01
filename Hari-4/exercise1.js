let a = 4;
const b = "Hello";
console.log(a);
console.log(b);
console.log('---------------------------------------------');

var fruits = ['apple', 'banana', 'orange', 'grape', 'kiwi'];
console.log('awal');
console.log(fruits);
fruits.push("PERSIMMONS");
console.log('tambah buah PERSIMMONS');
console.log(fruits);
fruits[2] = "MELON";
console.log('ubah buah orange jadi MELON');
console.log(fruits);
fruits.pop();
console.log('keluarin buah');
console.log(fruits);
console.log('---------------------------------------------');

var andre = {
    nama_depan: "Andre",
    nama_belakang: "Mangara",
    hobi: ["Konser"],
    angka_favorite: 3,
    memakai_kacamata: true
}

console.log('---------------Print objek awal------------- ');
console.log('Objek Andre');
console.log(andre);
console.log('Nama Depan = ' + andre.nama_depan);
console.log('Nama Belakang = ' + andre.nama_belakang);
console.log('Hobi = ' + andre.hobi);
console.log('Angka favorite = ' + andre.angka_favorite);
if (andre.memakai_kacamata) {
    console.log('Memakai Kacamata = Ya');
} else {
    console.log('Memakai Kacamata = Tidak');
}

console.log('---------------perubahan masing masing property------------- ');
console.log('Nama Lengkap = ' + andre.nama_depan + " " + andre.nama_belakang);
andre.angka_favorite = 8;
console.log('Angka favorite = ' + andre.angka_favorite);
andre.hobi.push("Coding");
console.log('Hobi = ' + andre.hobi);
andre.lulusan = "Hacktive8";
console.log('Lulusan = ' + andre.lulusan);

console.log('---------------loop hobi------------- ');
for (i = 0; i < andre.hobi.length; i++) {
    let j = i + 1;
    console.log('Hobi Ke -' + j + ' = ' + andre.hobi[i]);
}

console.log('---------------iterasi based on key value------------- ');
for (const [key, value] of Object.entries(andre)) {
    console.log(`${key}: ${value}`);
}

console.log('---------------Function Tanggal------------- ');
function printTanggal(a) {
    console.log("Tanggal Sekarang = " + a)
}
function tanggalSekarang() {
    return printTanggal(new Date());
}
tanggalSekarang();

console.log('---------------Function Ganjil Genap------------- ');
var c = [2, 3, 20, 21, "Berak"];

function printGanjilGenap(a) {
    console.log(a);
}

function ganjilGenap(a) {
    let b = "";
    if (!isNaN(a)) {
        if (a % 2 == 0) {
            b = "Angka " + a + " adalah Genap";
        } else {
            b = "Angka " + a + " adalah Ganjil";
        }
    } else {
        b = a + " Is Not Number";
    }

    return printGanjilGenap(b);
}

for (i = 0; i < c.length; i++) {
    ganjilGenap(c[i]);
}


