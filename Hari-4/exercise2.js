console.log('---------------Function Compare Number------------- ');
function compareNumbers(firstnumber, secondnumber) {
    var compared = firstnumber - secondnumber;
    if (compared < 0) {
        result = "true";
    } else if (compared > 0) {
        result = "false";
    } else {
        result = "-1"
    }
    return result;
}

console.log(compareNumbers(5, 8));
console.log(compareNumbers(5, 3));
console.log(compareNumbers(4, 4));
console.log(compareNumbers(3, 3));
console.log(compareNumbers(17, 8));

console.log('---------------Function Reverse String------------- ');
function reverseString(a) {
    let reversedstring = a.split('').reverse().join('');
    return reversedstring;
}

console.log(reverseString('Hellow World and Coders'));
console.log(reverseString('John Doe'));
console.log(reverseString('I am a Bookworm'));
console.log(reverseString('Coding is my Hobby'));
console.log(reverseString('Super'));

console.log('---------------Function Sort Huruf------------- ');
function urutHuruf(a) {
    let result = a.split("").sort().join("");
    return result;
}
console.log(urutHuruf('halo'));
console.log(urutHuruf('qwerty'));
console.log(urutHuruf('qwertyuiopasdfghjklzxcvbnm'));

console.log('---------------Function mySort Huruf------------- ');
function mySort(arr) {
    arr = arr.split("");
    for (i = 0; i < arr.length; i++) {
        for (j = 0; j < arr.length; j++) {
            if (arr[j] > arr[i]) {
                temp = arr[i];
                arr[i] = arr[j];
                arr[j] = temp;
            }
        }
    }
    return arr.join("");
}
console.log(mySort('halo'));
console.log(mySort('qwerty'));
console.log(mySort('qwertyuiopasdfghjklzxcvbnm'));

console.log('---------------Function Arithmetic------------- ');
function isArithmeticProgression(a) {
    let difference = 0;
    for (i = 0; i < a.length; i++) {
        if (!isNaN(a[i])) {
            if (i == 0) {
                difference = a[i + 1] - a[i];
            } else {
                j = i + 1;
                if (a.length != j) {
                    if (difference != a[i + 1] - a[i]) {
                        return console.log("Bukan Baris Aritmatika");
                    }
                } else {
                    console.log("Baris Aritmatika");
                }
            }
        } else {
            return console.log("Bukan Baris Aritmatika");
        }
    }
}
isArithmeticProgression([1, 2, 3, 4, 5, 6]);
isArithmeticProgression([1, 2, 3, 4, 5, 7]);
isArithmeticProgression([2, 4, 6, 8]);

console.log('---------------Function Three Step AB------------- ');

function threeStepAB(a) {
    //ambil parameter
    //pecah jadi array
    //ambil index a
    //ambil index b
    //kurangin b-a
    let b = a.split("");
    let indexa = b.indexOf("a");
    let indexb = b.indexOf("b");
    console.log("index a = " + indexa);
    console.log("index b = " + indexb);
    console.log(Math.abs(indexb - indexa));
    if (indexa == -1 || indexb == -1) {
        return false;
    } else {
        if (Math.abs(indexb - indexa) > 3) {
            return true;
        } else {
            return false;
        }
    }


}

console.log(threeStepAB("lane borrowed"));
console.log(threeStepAB("I am Sick"));
console.log(threeStepAB("you are boring"));
console.log(threeStepAB("barbarian"));
console.log(threeStepAB("bacon and meat"));