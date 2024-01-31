//Soal 1
var myArray = [];
console.log('Soal 1');
myArray.push("Apple");
console.log(myArray);
myArray.unshift("Banana");
console.log(myArray);
myArray.pop();
console.log(myArray);
myArray.unshift('Orange');
console.log(myArray);
myArray.shift();
console.log(myArray);

//Soal 2
var firstArray = ['Andre'];
var secondArray = ['Mangara', 'Siregar'];
console.log('Soal 2');
console.log(firstArray.concat(secondArray));
console.log(firstArray.concat(secondArray).join(','));

//Soal 3
var numbers = [1, 3, 4, 6, 2, 123, 6456, 1367];
console.log('Soal 3');
console.log('Ascending');
console.log(numbers.sort((a, b) => a - b));
console.log('Descending');
console.log(numbers.sort((a, b) => b - a));

//Soal 4
var fruits = ['apple', 'banana', 'orange', 'grape', 'kiwi'];
console.log('Soal 4');
console.log('Yang di Splice');
console.log(fruits.splice(1, 2));
console.log('Array Sisa');
console.log(fruits);

//Soal 5
var sentence = "Hello,World,JavaScript";
console.log('Soal 5');
console.log('Array Hasil');
console.log(sentence.split(','));
