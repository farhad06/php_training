var arr =[1,2,3,4];
//Print a Spacific element from an array
console.log(arr[2]);
//print all element using loop
console.log('print all element using loop.')
for(let i=0; i<arr.length;i++){
    console.log(arr[i]);
}
//at() mrthod

let idx=arr.at(4);
console.log(idx);

//concat()
let arr1=['First_name','Last_name'];
let arr2=['Farhad','Ahamed'];
let arr3=arr1.concat(arr2);
console.log(arr3);


//copyWithin()
let arr=['apple','ball','cat','dog'];
arr.copyWithin(3,0)
console.log(arr)

//entires()
const alpha=['A','B','C'];
let iter1=alpha.entries()

for(let entry of iter1){
    console.log(entry)
}

//every()

function isAdult(age){
    return age>=18;
}
let arr=[32,12,54,18,52];
let check=arr.every(isAdult);
console.log(check);
//filter()
let filter_check=arr.filter(isAdult);
console.log(filter_check);

//fill()
var fruite=['apple','banana','graps'];
fruite.fill('cherry');
console.log(fruite);

//find()
let arr=[5,6,7,9,12]
function isEven(num){
    if(num%2==0){
        return true;
    }else{
        return false;
    }
}

let evenNumbers=arr.find(isEven);
console.log(evenNumbers)
//findIndex()
let findIndex=arr.findIndex(isEven);
console.log(findIndex)

//indexOf()

let languages=['C','C++','Java','Javascript','Python'];
const index=languages.indexOf('Python');
console.log(index);

//join()
let Join=languages.join(" ");
console.log(Join);

//keys()
let iter =languages.keys()
for(let keys of iter){
    console.log(keys);
}
//values()
let iter_val =languages.values()
for(let value of iter_val){
    console.log(value);
}

//map()

let num=[2,3,4,5];
function square(num){
    return num*num;
}

let sq_num=num.map(square);
console.log(sq_num);

//pop()
let numbers=[1,2,3,45,6]
let pop_num=numbers.pop();
console.log(pop_num);
console.log(numbers)
//push()
numbers.push(90);
console.log(numbers)
//reduceRight
function add(acc,curr_val){
    return acc+curr_val;
}

let sum=numbers.reduceRight(add);
console.log(sum);

//reverse

numbers.reverse()
console.log(numbers);

//shift()
let shift_element=numbers.shift(120);
console.log(shift_element);
console.log(numbers);
//unshift
numbers.unshift(120,102);
console.log(numbers);

//slice
let new_numbers=numbers.slice(1,4);
console.log(new_numbers);
//sort()
numbers.sort();
console.log(numbers);

//toLocalString

numbers.toLocaleString();
console.log(numbers);
// console.log(typeof(numbers));

//tostring()
numbers.toString();
console.log(numbers);