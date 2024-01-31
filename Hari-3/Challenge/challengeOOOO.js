// for (i = 0; i < 100; i++) {
//     var j = 0;
//     var O = "";
//     while (j < 100) {
//         O += "O";
//         j++;
//     }
//     console.log(O);
//     j = 0;
// }

// inisiasi variabel
var i = 1;
var O = "";

//Perulangan
//Looping sampai nilai i = 100
while (i <= 100) {
    //pengecekan kalau dia ganjil atau genap
    if (i % 2 != 0) {
        // inisiasi perulangan untuk menulis O sampai 100
        var j = 1;
        while (j <= 100) {
            O += "O";
            j++;
        }
        console.log(O);
        j = 0;
        O = ""
    } else {
        console.log("Saya orang ke-" + i + " menjadi spasi");
    }
    i++;
}