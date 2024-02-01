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
    let difference = a[1] - a[0];
    for (i = 0; i < a.length; i++) {
        if (!isNaN(a[i])) {
            j = i + 1;
            if (a.length != j) {
                if (difference != a[i + 1] - a[i]) {
                    return console.log("Bukan Baris Aritmatika");
                }
            } else {
                console.log("Baris Aritmatika");
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
    let b = a.split("");
    let indexa = b.indexOf("a");
    let indexb = b.indexOf("b");
    if (indexa == -1 || indexb == -1) {
        return false;
    } else {
        if (Math.abs(indexb - indexa) >= 3) {
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

console.log('---------------Function GCD------------- ');

function getFaktor(a, b) {
    var array1 = [1];
    var array2 = [1];
    for (i = 2; i <= a; i++) {
        if (a % i == 0) {
            array1.push(i);
        }
    }
    for (i = 2; i <= b; i++) {
        if (b % i == 0) {
            array2.push(i);
        }
    }
    return [array1, array2];
}

function gcd(a, b) {
    const values = getFaktor(a, b);
    var first = values[0].reverse();
    var second = values[1].reverse();
    var max;
    for (i = 0; i < first.length; i++) {
        for (j = 0; j < second.length; j++) {
            if (first[i] == second[j]) {
                max = first[i];
                return max;
            }
        }
    }
}

console.log(gcd(12, 16));
console.log(gcd(50, 40));
console.log(gcd(22, 99));
console.log(gcd(24, 36));
console.log(gcd(17, 23));

console.log('---------------Function Is Prime------------- ');
const isPrime = num => {
    for (let i = 2, s = Math.sqrt(num); i <= s; i++) {
        if (num % i === 0) return false;
    }
    return num > 1;
}

console.log(isPrime(3));
console.log(isPrime(7));
console.log(isPrime(6));
console.log(isPrime(23));
console.log(isPrime(33));

console.log('---------------Function List Prime------------- ');
var listPrimes = [];
function listPrime(a, b) {
    listPrimes = [];
    for (i = a; i <= b; i++) {
        if (isPrime(i)) {
            listPrimes.push(i);
        }
    }
    return listPrimes;
}
console.log(listPrime(1, 5));
console.log(listPrime(5, 10));
console.log(listPrime(10, 20));