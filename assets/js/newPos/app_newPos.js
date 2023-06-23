import {inputs} from './input_newPos';

const {category,search} = inputs;

console.log(category, search);

console.log(testHandler())

testHandler2();

asyncgetVendor("/clientPos/fetchCategoryList",testCallback,errCallback)