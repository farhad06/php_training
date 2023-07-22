const str="Hello World!";
//length
let size=str.length;
console.log(size)
//charAt()
let index=str.charAt(1);
console.log(index)
//charcodeAt()
let result=str.charCodeAt(7);
console.log(result);
//codepointAt()
let res=str.codePointAt(1);
console.log(res);
//concat()
let empStr=" ";
let joinStr=empStr.concat('Javascript','is','fun');
console.log(joinStr);
//endswith()
let ends_with=str.endsWith('!');
console.log(ends_with);
//startwith()
let start_with=str.startsWith('h');
console.log(start_with);
//includes()
const msg="Javascript is fun";
let result_includes=msg.includes('Java');
console.log(result_includes);
//indexof()
console.log(str.indexOf('W'));
//padend()
let pad_str="Code";
let pad_str_res=pad_str.padEnd(10,'*');
console.log(pad_str_res);
//padstart()
let pad_start_result=pad_str.padStart(10,'*');
console.log(pad_start_result);
//repeat
let string="Good Night";
const repeat_res=string.repeat(3);
console.log(repeat_res);
//replace
let replace_string='ball bat';
const replace_result=replace_string.replace('b','c');
console.log(replace_result);
//replace all 
const replace_all_result=replace_string.replaceAll('b','c');
console.log(replace_all_result);
//search()
//split()
//trim()
//toLower()
//toUpper()
//substring()==?Cateate nnns