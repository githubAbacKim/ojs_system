/*
    handlerJS collect the functions that relates to the eventlistener
*/ 

// create new cart
const createCartHandler = () =>{}
// open cart modal
const openCartListHandler = () =>{}
// open unpaid cart
const openUnpaidCartHandler = () =>{}
// select cart
const selectCartHandler = () =>{}
// close selected cart
const closeCartHandler = () =>{}
// void cart or reset cart status to not_paid and reset ordered_status to not_paid
const voidCartHandler = () =>{}

// add item to cart
const addItem = () =>{}
// delete item to cart
const deleteItem = () =>{}

// pay cart selected
const payHandler = () =>{}
// print receipt
const printReceiptHandler = () =>{}
// print bill
const printBillHandler = () =>{}

// select category
const selectCategoryHandler = () =>{}
// search item
const searchItemHandler = () =>{}


const testHandler = () =>{
    let tmp = null;
    $.ajax({
      url: "/clientPos/fetchCategoryList",
			async: false,
			dataType: "json",
			success: function (results) {
				$.each(results, function (i, result) {
					tmp = results;
				});
			},
			error: function () {
				console.log("error");
			},
    });
    return tmp;
}

const testHandler2 = () =>{
  const url = "/clientPos/fetchCategoryList";
  getPromise(url)
  .then((response) => {
      console.log(response.data)
  })
  .catch((error) => {
      console.log(error);
  });
}

const testCallback = (response) =>{
  const {success,data,error} = response;
  console.log(data,response);
}

const errCallback = (error) =>{
  console.log(error)
}

