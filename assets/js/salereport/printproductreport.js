
const inputs = {
    year: $('#year').val(),
    month: $('#mon').val(),
    id: $('#supplierCont').val()
}

const tempInput = {
    cont: $('#dataCont'),
    temp: $('#dataTemp')
}

// function displayProducts(){
//     postData(inputs, dataUrl)
//     .then((response) => {
//         cb_renderProduct(response);
//     })
//     .catch((response) => {
//         console.log(response);
//     });
// }
asyncget(dataUrl, cb_renderProduct);
function cb_renderProduct(response){
    console.log(response);
    // let data = JSON.parse(response);
    // data.forEach(d => {
    //     let dataArr = {
    //         name: d.name,
    //         qty: d.qty
    //     }
    //     renderTemplate(tempInput.cont,tempInput.temp,dataArr);
    // });
    
}